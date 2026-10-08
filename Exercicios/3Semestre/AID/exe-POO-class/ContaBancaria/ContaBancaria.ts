


export class ContaBancaria{
    private saldo: number=0;
    private titular: string;
//Getters and Setters
 public setTitular(x: string): void{
        this.titular = x;
    }public getTitular(): string {
        return this.titular;
 }
    public depositar(x: number): void{
        this.saldo = this.saldo + x;
    }

public sacar(x: number): void{
        this.saldo = this.saldo - x;
    }

public consultarSaldo(): number{
        return this.saldo;
    }

}
