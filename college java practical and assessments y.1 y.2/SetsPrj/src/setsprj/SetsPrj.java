package setsprj;

import java.util.Set;
import java.util.HashSet;


public class SetsPrj 
{

    public static void main(String[] args)
    {
        Set<Integer> set1 = new HashSet<>();
        Set<Integer> set2 = new HashSet<>();
        Set<Integer> set3 = new HashSet<>();
        Set<Integer> set4 = new HashSet<>();
        Set<Integer> set5 = new HashSet<>();
        Set<Integer> set6 = new HashSet<>();        
        
        for(int k=0; k<10; k++)
        {
            set1.add(k);
            set2.add(k*2);
        }
        
        
        set3 = SF.union(set2, set1);
        
        System.out.println(set3);
        
                
        /*for(int j=30; j<60; j++)  
        {
        /    set3.add(j);
            set4.add((j/2)+2);
        }
        */
        System.out.println(set1);
                System.out.println(set1.hashCode());
        System.out.println(set2);
                System.out.println(set2.hashCode());
        //System.out.println(set3);
        //        System.out.println(set3.hashCode());
        //System.out.println(set4);
        //        System.out.println(set4.hashCode());
        
        
        
        
    }
    
}
