package webapp.pizzaria_demo_project.Controller.Routes;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class indexController {
    @GetMapping("/")
    public String acessoHome() {
        return "pizzaPage";
    }
}
