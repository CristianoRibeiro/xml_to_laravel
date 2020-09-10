<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DadosExport implements FromArray, WithBatchInserts, WithChunkReading, WithHeadings
{
    use Exportable;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }


    public function batchSize(): int
    {
        // TODO: Implement batchSize() method.
    }

    public function chunkSize(): int
    {
        // TODO: Implement chunkSize() method.
    }

    public function headings(): array
    {
        return [
            'nome', 'razao', 'tipo_documento', 'documento', 'cep', 'endereco', 'bairro', 'cidade', 'uf', 'tabeliao', 'ativo', 'email', 'telefone'
        ];
    }
}
