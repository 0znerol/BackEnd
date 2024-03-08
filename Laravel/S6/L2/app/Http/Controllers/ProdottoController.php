<?php
namespace App\Http\Controllers;

use App\Models\Prodotto;
use Illuminate\Http\Request;

class ProdottoController extends Controller
{

    public $products = [
        [
            'id' => 1,
            'name' => 'telefono',
            'description' => 'telefono cellulare',
            'price' => 100
        ],
        [
            'id' => 2,
            'name' => 'laptop',
            'description' => 'computer portatile',
            'price' => 300
        ],
        [
            'id' => 3,
            'name' => 'tablet',
            'description' => 'tablet pc',
            'price' => 200
        ],
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', ['prodotti' => $this->products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        print_r("ciao");
        $values = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $newProductId = count($this->products) + 1;

        $newProduct = [
            'id' => $newProductId,
            'name' => $values['name'],
            'description' => $values['description'],
            'price' => $values['price'],
        ];

        $this->products[] = $newProduct;

        return redirect()->route('prodotti.index')->with('success', 'Prodotto creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show($index)
    {
        if (!isset($this->products[$index])) {
            abort(404);
        }
    
        $prodotto = $this->products[$index-1];
        return view('show', ['prodotto' => $prodotto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodotto $prodotto)
    {
        return view('prodotti.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodotto $prodotto)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'prezzo' => 'required|numeric',
        ]);

        //TODO
        return redirect()->route('prodotti.index')->with('success', 'Prodotto aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodotto $prodotto)
    {
        //TODO
        return redirect()->route('prodotti.index')->with('success', 'Prodotto eliminato con successo.');
    }
}