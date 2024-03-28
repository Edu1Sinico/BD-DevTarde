package webapp.pizzaria_demo_project.Model;

import java.io.Serializable;

import jakarta.persistence.*;

@Entity
public class Pizza implements Serializable {
    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private long id_pizza;
    private String sabor_pizza;
    private String valor_pizza;
    private char tamanho_pizza;


    public long getId_pizza() {
        return id_pizza;
    }

    public void setId_pizza(int id_pizza) {
        this.id_pizza = id_pizza;
    }

    public String getSabor_pizza() {
        return sabor_pizza;
    }

    public void setSabor_pizza(String sabor_pizza) {
        this.sabor_pizza = sabor_pizza;
    }

    public String getValor_pizza() {
        return valor_pizza;
    }

    public void setValor_pizza(String valor_pizza) {
        this.valor_pizza = valor_pizza;
    }

    public char getTamanho_pizza() {
        return tamanho_pizza;
    }

    public void setTamanho_pizza(char tamanho_pizza) {
        this.tamanho_pizza = tamanho_pizza;
    }    
}