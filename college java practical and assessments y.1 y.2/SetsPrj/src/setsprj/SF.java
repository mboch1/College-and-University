package setsprj;

import java.util.Set;
import java.util.HashSet;


public class SF 
{
    public static <T> Set<T> union(Set<T> setA, Set<T> setB)
    {
        
        //zbior A 
        Set<T> tmpSet = new HashSet<>(setA);
        
       // suma zbiorow A i B 
        tmpSet.addAll(setB);
        
       //this is intersection [czesc wspolna] 
       /* for(T x : setA)
        {
            if(setB.contains(x))
            {
                tmpSet.add(x);
            }
        }
        */    
        return tmpSet;
    }
}
