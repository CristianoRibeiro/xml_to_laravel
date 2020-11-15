<?php

namespace App\Http\Controllers;

use App\Cartorio;
use App\Endereco;
use App\Estado;
use App\Telefone;
use Illuminate\Http\Request;

class CartorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartorio = Cartorio::paginate(8);

        return view('cartorio.index', compact('cartorio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();

//        dd($estados);

        return view('cartorio.store', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required','string', 'max:255'],
            'razao' => ['required'],
            'documento' => ['required', 'string'],
            'tabeliao' => ['required', 'string'],
            'ativo' => ['required', 'string'],
            'endereco' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'uf' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'telefone' => [''],
            'email' => ['email'],
        ]);

        $cartorio= new Cartorio();
        $cartorio->nome= $request['nome'];
        $cartorio->razao= $request['razao'];
        $cartorio->documento= $request['documento'];
        $cartorio->tabeliao= $request['tabeliao'];
        $cartorio->ativo= $request['ativo'];

        if(!$cartorio->save()){
            return back()->with('error', 'Erro ao cadastrar dados do cartório!');
        }

        $telefone = new Telefone();
        $telefone->email = $request['email'];
        $telefone->telefone = $request['telefone'];
        $telefone->cartorio_id = $cartorio->id;
        $telefone->save();

        $estado = Estado::where('sigla', $request['uf'])->first();

        $endereco = new Endereco();
        $endereco->cep = $request['cep'];
        $endereco->bairro = $request['bairro'];
        $endereco->endereco = $request['endereco'];
        $endereco->cidade = $request['cidade'];
        $endereco->estado_id = $estado->id;
        $endereco->cartorio_id = $cartorio->id;
        $endereco->save();

        return redirect('/cartorio')->with('success', 'Cartório cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartorio = Cartorio::where('id', $id)->first();
        $estados = Estado::all();
        $endereco = Endereco::where('cartorio_id', $id)->first();
        $telefone = Telefone::where('cartorio_id', $id)->first();

        return view('cartorio.show', compact('cartorio', 'endereco', 'telefone', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cartorio = Cartorio::where('id', $id)->first();
        $endereco = Endereco::where('cartorio_id', $id)->first();
        $telefone = Telefone::where('cartorio_id', $id)->first();
        $estados = Estado::all();


        return view('cartorio.edit', compact('cartorio', 'endereco', 'telefone', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => ['required','string', 'max:255'],
            'razao' => ['required'],
            'documento' => ['required', 'string'],
            'tabeliao' => ['required', 'string'],
            'ativo' => ['required', 'string'],
            'endereco' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'uf' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'telefone' => [''],
            'email' => ['email', ''],
        ]);

        $cartorio= Cartorio::find($id);;
        $cartorio->nome= $request['nome'];
        $cartorio->razao= $request['razao'];
        $cartorio->documento= $request['documento'];
        $cartorio->tabeliao= $request['tabeliao'];
        $cartorio->ativo= $request['ativo'];

        if(!$cartorio->save()){
            return back()->with('error', 'Erro ao cadastrar dados do cartório!');
        }


        $telefone = Telefone::where('cartorio_id', $id)->first();

        $telefone->email = $request['email'];
        $telefone->telefone = $request['telefone'];
        $telefone->save();

        $estado = Estado::where('sigla', $request['uf'])->first();

        $endereco = Endereco::where('cartorio_id', $id)->first();
        $endereco->cep = $request['cep'];
        $endereco->bairro = $request['bairro'];
        $endereco->endereco = $request['endereco'];
        $endereco->cidade = $request['cidade'];
        $endereco->estado_id = $estado->id;
        $endereco->save();

        return redirect('/cartorio')->with('success', 'Cartório atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartorio = Cartorio::find($id);
        $cartorio->delete();

        return redirect('/cartorio')->with('success', 'Cartório excluído com sucesso!');
    }
}
