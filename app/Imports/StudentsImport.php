<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithBatchInserts, WithChunkReading
{
    use SkipsFailures;

    protected int $classId;

    public function __construct(int $classId)
    {
        $this->classId = $classId;
    }

    public function model(array $row)
    {
        return new Student([
            'std_name'       => $row['std_name'],
            'std_classes_id' => $this->classId,
            'std_created_by' => Auth::id(),
        ]);
    }

    public function rules(): array
    {
        return [
            'std_name' => 'required|string|max:255',
        ];
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function chunkSize(): int
    {
        return 200;
    }
}