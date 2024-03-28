package webapp.pizzaria_demo_project.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;

import webapp.pizzaria_demo_project.Model.Pizza;
import webapp.pizzaria_demo_project.Repository.PizzaRepository;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class PizzaController {
    @Autowired
    private PizzaRepository pr;

    @PostMapping("cadastro-pizza")
    public String postCadastrarPizza(Pizza pizza) {
        pr.save(pizza);
        
        return "pizzaPage";
    }
    
    @RequestMapping(value = "/lista", method = RequestMethod.GET)
    public ModelAndView listarPizzas() {
        ModelAndView mv = new ModelAndView("fragmentos/listaPizza");
        mv.addObject("pizza", pr.findAll());
        return mv;
    }
}
