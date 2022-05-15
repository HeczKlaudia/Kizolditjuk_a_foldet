class Bejegyzes {
    constructor(elem, adat, osztalyok) {
        this.elem = elem;
        this.adat = adat;

        this.osztalyok = osztalyok;
        this.osztaly = this.elem.find(".osztaly");
        this.tevekenyseg_nev = this.elem.find(".tevekenyseg_nev");
        this.pontszam = this.elem.find(".pontszam");
        this.statusz = this.elem.find(".allapot");

        this.setAdat(adat);
    }

    setAdat(adat) {
        this.osztaly.text(this.osztalyok[adat.osztaly_id]);
        this.tevekenyseg_nev.text(adat.tevekenyseg.tevekenyseg_nev);
        this.pontszam.text(adat.tevekenyseg.pontszam);
        this.statusz.text(adat.allapot);
    }
}
