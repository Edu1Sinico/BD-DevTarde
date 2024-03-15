package webapp.pizzaria_demo_project.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import webapp.pizzaria_demo_project.Model.Pizza;
import webapp.pizzaria_demo_project.Repository.PizzaRepository;

@Controller
public class PizzaController {
    @Autowired
    private PizzaRepository pz;

    @RequestMapping(value = "/pizza", method = RequestMethod.GET)
    public String abrirPizzaPage() {
        return "pizzaPage";
    }

    @RequestMapping(value = "/pizza", method = RequestMethod.POST)
    public String gravarfuncionario(Pizza pizza) {
        pz.save(pizza);
        return "redirect:/pizzaPage";
    }
}
