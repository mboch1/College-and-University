
package carhashmap;

/**
 *
 * @author duncanwalker
 */

import java.util.*;
import java.util.HashMap;

public class CarHashMap 
{

    
    public static void main(String[] args) 
    {
    
     Map<String,Car> carMap = new HashMap<String,Car>();   
        
     Car vw = new Car("H22754","Volkswagen");
     Car mustang = new Car("M11349","Mustang");
     Car porsche = new Car("C87223","porsche");
     
     
     carMap.put(vw.getVin(), vw);
     carMap.put(mustang.getVin(), mustang);
     carMap.put(porsche.getVin(), porsche);
     
     Set<String> keys = carMap.keySet();
     
     System.out.println("Here are the keys ");
     
     for(String k : keys)
     {
       System.out.println("Key = "+k);  
     }
     
    }
    
}
