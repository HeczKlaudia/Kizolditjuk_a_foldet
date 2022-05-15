$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const urlapKezeles = new UrlapKezeles(myAjax);
    const bejegyzesek = [];
    const tevekenysegek = [];
    const osztalyok = ["Válassz osztályt!", "SZFA1", "SZFA2", "IRÜ"];

    let apiVegpont = "/api/bejegyzesek";
    let tevekenysegApiVegpont = "/api/tevekenysegek";
    //let ujbejegyzes = "/api/bejegyzes"

    const szuloElem = $(".adatok");
    const sablonElem = $(".sablon");

    szuloElem.empty();

    urlapKezeles.osztalyFeltolt();
    myAjax.getAdat(apiVegpont, bejegyzesek, megjelenit);
    myAjax.getAdat(tevekenysegApiVegpont, tevekenysegek, urlapKezeles.tevekenysegFeltolt);
    
    function megjelenit() {
        szuloElem.show();
        bejegyzesek.forEach(function (elem) {
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujBejegyzes = new Bejegyzes(ujElem, elem, osztalyok);
        });
        sablonElem.hide();
    }

    /*     $(".kuld").on("click", function () {
        let tevekenysegek = $("#tevekenysegek").val();
        let osztalyok = $("#osztalyok").val();
        let allapot = "jóváhagyásra vár";

        let adat = {
            osztaly_id: osztalyok,
            tevekenyseg_nev: tevekenysegek,
            allapot: allapot,
        };
        console.log(adat);
        myAjax.postAdat(ujbejegyzes, adat);
    }); */
});

class UrlapKezeles {
    constructor(myAjax) {
        this.myAjax = myAjax;
    
            this.osztalyokSelect = $("#osztalyok");
            this.tevekenysegekSelect = $("#tevekenysegek");
            console.log(this.tevekenysegekSelect);
            this.osztalyFeltolt(osztalyok);
            $(".kuld").on("click", () => {
                const adat = {
                    osztalyokID: $("#osztalyok").val(),
                    tevekenysegId: $("#tevekenysegek").val(),
                };
                console.log(adat);
                let bejegyzesVegpont = "/api/bejegyzes";
                myAjax.postAdat(bejegyzesVegpont, adat);
            });
        }
    

        tevekenysegFeltolt(tevekenysegek) {
            let option = "";
        tevekenysegek.forEach(function (elem) {
            option =
                "<option value='" +
                elem.tevekenyseg_id +
                "'>" +
                elem.tevekenyseg_nev +
                "</option>";
            $("#tevekenysegek").append(option);
        });
    }

    osztalyFeltolt() {
        let option = "";

        for (var i = 0; i < osztalyok.length; i++) {
            option += "<option>" + osztalyok[i] + "</option>";
        }

        document.getElementById("osztalyok").innerHTML = option;
    }
    
}


