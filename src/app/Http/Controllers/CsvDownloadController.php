<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvDownloadController extends Controller
{
    public function csvExport()
    {
        // contactsテーブルとcategoryテーブルを結合してデータを取得
        $contacts = Contact::select(
            'contacts.first_name',
            'contacts.last_name',
            'contacts.gender',
            'contacts.email',
            'contacts.tell',
            'contacts.address',
            'contacts.building',
            'contacts.detail',
            'categories.content as category_content'
        )
            ->leftJoin('categories', 'contacts.category_id', '=', 'categories.id')
            ->get();

        $csvHeader = [
            'お名前',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせ内容'
        ];

        // CSVデータの作成
        $csvData = [];
        foreach ($contacts as $contact) {
            $csvData[] = [
                $contact->first_name . ' ' . $contact->last_name,
                $contact->gender === 1 ? '男性' : ($contact->gender === 2 ? '女性' : 'その他'),
                $contact->email,
                $contact->tell,
                $contact->address,
                $contact->building,
                $contact->category_content,
                $contact->detail
            ];
        }

        // ストリームレスポンスの生成
        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            // ヘッダーの書き込み
            fputcsv($handle, $csvHeader);
            // データの書き込み
            foreach ($csvData as $row) {
                foreach ($row as $key => $value) {
                    $row[$key] = mb_convert_encoding($value, 'SJIS-win', 'UTF-8');
                }
                fputcsv($handle, $row);
            }
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }
}
