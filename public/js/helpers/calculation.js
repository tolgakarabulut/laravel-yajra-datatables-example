!(()=>{
    const calculation = {
        elements:{
            $1m : 1000000,
            $density: "0.92",
            $formCalc : $("input[name='piece'] , input[name='kilogram']"),
            $formChangeCalc : $("input[name='width'] , input[name='height'] , input[name='micron']"),
            form:{
                $width : $("input[name='width']"),
                $height: $("input[name='height']"),
                $micron: $("input[name='micron']"),
                $piece : $("input[name='piece']"),
                $kilogram : $("input[name='kilogram']"),
                $density: $("input[name='density']")
            }
        },
        calcPieceAndKilogram(){
            calculation.calc( $(this).attr('name') );
        },
        reCalc(){
                calculation.calc( "piece" );
                calculation.calc( "kilogram" );
        },
        calc( type ){
            let width
                ,height
                ,micron
                ,density
                ,one
                ,piece
                ,kilogram
                ,_this
                , form;

            _this = calculation;

            form = _this.elements.form;
            width = form.$width.val();
            height = form.$height.val();
            micron = form.$micron.val();
            density = _this.elements.$density;
            one = _this.elements.$1m;
            piece = form.$piece.val();
            kilogram = form.$kilogram.val();

            let result = 0;
            let key = "kilogram";
            if( type === "piece"){
                result =  kilogram = (( width * height * micron * parseFloat(density) * piece) /  one  ) ;
            }else{
                result = ( kilogram / ((width * height * micron * parseFloat(density) / one ) ) ) ;
                key = "piece";
            }
            form[`$${key}`].val( result.toFixed(3) );
        },
        bindEvents(){
            this.elements.$formCalc.on('keyup', this.calcPieceAndKilogram );
            this.elements.$formChangeCalc.on('keyup', this.reCalc );
        },
        init(){
            this.bindEvents();
        }
    }
    calculation.init();
})();
