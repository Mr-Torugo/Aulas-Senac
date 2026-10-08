class Entregador {
    private nome: string;
    private entregas: number = 0;

    public setNome(x: string): void {
        this.nome = x;
    }

    public fazerEntrega(): void {
        this.entregas=this.entregas+1;
    }

    public verificaQtd(): number {
        return this.entregas;
    }

}

const trabalhadorA = new Entregador();
trabalhadorA.setNome("André");
trabalhadorA.fazerEntrega();
trabalhadorA.fazerEntrega();
let qtdEntregas = trabalhadorA.verificaQtd();
console.log(qtdEntregas); 

