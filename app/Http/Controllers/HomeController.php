<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\DadosExport;
use Excel;
use Orchestra\Parser\Xml\Facade as XmlParser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function convert()
    {
        return view('convert.index');
    }


    public function store(Request $request)
    {
        if (!$request->hasFile('file')) {
            abort(400, 'Nenhum arquivo foi enviado.');
        }


        $xml = XmlParser::load($request->file('file'));

        $cartorios_dados = $xml->parse([
            'cartorios' => ['uses' => 'cartorio[nome,razao,tipo_documento,documento,cep,endereco,bairro,cidade,uf,tabeliao,ativo,email,telefone]'],
        ]);

        return Excel::download(new DadosExport($cartorios_dados), 'users.xlsx');

    }
}
