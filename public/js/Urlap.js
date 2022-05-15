class Urlap {
    constructor() {
        this.osztalyokSelect = $("#osztalyok");
        this.tevekenysegekSelect = $("#tevekenysegek");
        console.log(this.tevekenysegekSelect);
        this.optionOsztalyokFeltolt(osztalyokTmb);
        $("#kuld").on("click", () => {
            const adat = {
                osztalyokID: $("#osztalyok").val(),
                tevekenysegId: $("#tevekenysegek").val(),
            };
            console.log(adat);
            this.kattintasTrigger(adat);
        });
    }
    kattintasTrigger(adat) {
        let event = new CustomEvent("kuldKattintas", {
            detail: adat, //ezzel adatokat tudok átadni
        });
        window.dispatchEvent(event);
    }

    //tevékenységek feltöltése
    optionTevekenysegFeltolt(tomb) {
        console.log(tomb);
        tomb.forEach((element) => {
            $("#tevekenysegek").append(
                `<option value='${element.id}'>${element.tevekenyseg_nev}</option>`
            );
        });
    }
    optionOsztalyokFeltolt(tomb) {
        console.log(tomb);
        tomb.forEach((element, index) => {
            this.osztalyokSelect.append(
                `<option value='${index}'>${element}</option>`
            );
        });
    }
}
