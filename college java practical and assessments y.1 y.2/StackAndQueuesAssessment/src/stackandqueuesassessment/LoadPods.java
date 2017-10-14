package stackandqueuesassessment;

import java.util.*;

/**
 *
 * @author Michal Bochenek
 */
public class LoadPods 
{
     Set<String> car1 =  new HashSet<>();
     Set<String> car2 =  new HashSet<>();   
    
     LoadPods(Set<String> cargo1, Set<String> cargo2)
             {
              cargo1 = car1;
              cargo2 = car2;
             }
    
    public String GenerateCargo()
    {
        //generates pseudorandom number
        Random rgen = new Random();
        
        //use type and nbr to build cargo ID later on and return cargo
        String type;
        String nbr;
        String cargoID;
        
        //type of cargo T - technology, F - food, P - personal
        
        String[] typeofcargo = {"T", "F", "P"};
        String[] cargonumber = new String[89];
        
        //filling cargonumber with string values
        for(int i=0; i<89; i++)
        {
            int j=10+i;
            cargonumber[i] = Integer.toString(j);
        }
        //pointer for searching the respective arrays
        int t;
        int c;
        
        t = rgen.nextInt(2);
        c = rgen.nextInt(88);
        
        //use generated numbers to build a cargoID string
        
        type = typeofcargo[t];
        nbr = cargonumber[c];
        
        cargoID = type + nbr;
        
        return cargoID;
    }
    
    //method for loading pod1 [always full]
    public Set<String> LoadPods()         
    {     
    //this will generate a set of 9 different! types of cargo, since there can be only one entry of the same type in a set
    while(car1.size()<9)
    {
        car1.add(GenerateCargo());
    }
        //System.out.println(car1);     
    
    
    //generates pseudorandom number
    Random rgen = new Random();
              
    //generate cargo2 size 0-9 elements    
    int pod2size = rgen.nextInt(9);
       
        if(pod2size>0)
        {
            while(car2.size()<=pod2size)
            {
                car2.add(GenerateCargo());
                
                //no such element can be in both sets, prevent this by this statement
                if(car2.contains(car1))
                {
                    car2.remove(car1);
                }
            }
            //check if car2 contains car1 element, returns true if yes
            //System.out.println(car1.contains(car2));
        }         
        return new carload(car1, car2);
    }   
}
