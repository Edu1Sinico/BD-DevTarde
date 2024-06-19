package webapp.pizzaria_demo_project.Repository;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import webapp.pizzaria_demo_project.Model.Pizza;

import java.util.List;

public interface PizzaRepository extends CrudRepository<Pizza, Long> {
    Pizza findById(long id_pizza);

    @Query(value = "select u from Pizza u where u.sabor_pizza like %?1%")
    List<Pizza> findBySabores_Pizza(String sabor_pizza);
}
