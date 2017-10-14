package maphash;

import java.util.HashMap;
import java.util.Map;
import java.util.Set;

public class MapHash 
{

    public static void main(String[] args) 
    {
        Map<String, Car> carmap = new HashMap<>();
        
        Car vw = new Car("HA2212","Volkswagen");
        Car mustang = new Car("MI2666","Mustang");
        Car mazda = new Car("H34357","mazda");
        Car porsche = new Car("GHF227","porsche");
        
        carmap.put(vw.getVin(), vw);
        carmap.put(mustang.getVin(), mustang);
        carmap.put(mazda.getVin(),mazda);
        carmap.put(porsche.getVin(), porsche);
        

        Set<String> keys = carmap.keySet();
    
    
        System.out.println("Here are the keys: ");
        for(String k : keys)
        {
            System.out.println("key = "+k);
        }
        
        Set<Map.Entry<String, Car>> cars = carmap.entrySet(); 
            
        System.out.println("mappings: ");
        for(Map.Entry<String, Car> entry : cars)
        {
            System.out.println("key: "+entry.getKey());
            System.out.println("value: "+entry.getValue());
        }
            
    }
    
}
