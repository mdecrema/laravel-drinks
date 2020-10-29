<html>
    <head>
    </head>
    <body>
        <form action="{{route('drinks.store')}}" method="POST">
            @csrf
            @method('POST')
            
            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" placeholder="Nome Drink" id="name">
            </div>

            <div>
                <label for="origin">Origine</label>
                <input type="text" name="origin" placeholder="Origine" id="origin">
            </div>

            <div>
                <label for="ingredients">Ingredienti</label>
                <input type="text" name="ingredients" placeholder="Ingredienti" id="ingredients">
            </div>

            <div>
                <label for="price">Costo/€</label>
                <input type="text" name="price" placeholder="Prezzo" id="price">
            </div>

            <div>
                <input type="submit" value="salva">
            </div>
        </form>
    </body>
</html>