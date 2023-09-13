<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class UsersExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'name',
        'email',
        'phone',
        'age_group',
        'gender',
        'who_will_be_training',
        'disciplines_in_martial_arts',
        'stretching_flexibility_spiritual_meditative_arts',
        'health_and_wellness_guidance',
        'all_fitness_including',
        'fitness',
        'preferred_language',
        'instructor_gender',
        'preferred_training_style',
        'instructor_experience',
        'plan_amount',
        'plan_amount_currency',
        'plan_interval',
        'status',
        DB::raw('(CASE WHEN request_type = "free" THEN "Free" ELSE "Paid" END)'), DB::raw('(CASE WHEN email_verified_at THEN "Verified" ELSE "Pending" END)'), DB::raw('(CASE WHEN is_block = "0" THEN "Unblock" ELSE "Block" END)'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y %h:%i:%s") as createdAt'))->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Phone',
            'Age Group',
            'Gender',
            'Who Will Be Training',
            'Disciplines',
            'Stretching Flexibility Spiritual Meditative Arts',
            'Health And Wellness Guidance',
            'All Fitness Including',
            'Fitness',
            'Preferred Language',
            'Instructor Gender',
            'Preferred Training Style',
            'Instructor Experience',
            'Plan Amount',
            'Amount Currency',
            'Plan Interval',
            'Status',
            'Subscription',
            'Verified',
            'Block',
            'Created At',
        ];
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:X1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('ff1648');

                 $event->sheet->getDelegate()->freezePane('A2');
                //  $event->sheet->getDelegate()->getStyle('A1:X1')->getFont()->setBold(true);
                 $event->sheet->getDelegate()->getStyle('A1:X1')->getFont()->getColor()->setARGB('ffffff');
            },
        ];
    }
}
