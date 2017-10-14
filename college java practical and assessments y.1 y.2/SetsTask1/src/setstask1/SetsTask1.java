package setstask1;
/**
 *
 * @author ec1401916
 */

import java.util.Set;
import java.util.HashSet;


public class SetsTask1 
{

    public static void main(String[] args) 
    {
        //Set1 All the numbers between 0 and 9999
        Set<Integer> set1 = new HashSet<>(); 
        //Set2 All the perfect square numbers between 0 and 9999
        Set<Integer> set2 = new HashSet<>(); 
        //Set3 All the perfect cubes numbers between 0 and 9999
        Set<Integer> set3 = new HashSet<>(); 
        //Set4 All the numbers divisible by 5 between 0 and 9999
        Set<Integer> set4 = new HashSet<>(); 
        //Set5 All the numbers divisible by 127 between 0 and 9999
        Set<Integer> set5 = new HashSet<>();
        //Set6 All the numbers divisible by 1016 between 0 and 9999
        Set<Integer> set6 = new HashSet<>();
        //Set7 All the perfect numbers and their divisors between 0 and 9999
        Set<Integer> set7 = new HashSet<>();
        //Set8 all the Fibonacci numbers between 0 and 9999
        Set<Integer> set8 = new HashSet<>();
        
        for(int i=0; i<10000; i++)
        {     
            set1.add(i);     
        }
        
        //sets 2 and 3 will be hard-coded as maths is quite complex
        
        set2.add(6*6);
        set2.add(28*28);
        set2.add(496*496);
        set2.add(8128*8128);
        
        set3.add(6*6*6);
        set3.add(28*28*28);
        set3.add(496*496*496);
        // this is above integer limit set3.add(8128*8128*8128);
        
        //set 4
        for(int j=0; j<10000; j++)
        {
            if(j%5==0)
            {
                set4.add(j);
            }
            if(j%127==0)
            {
                set5.add(j);
            }
            if(j%1016==0)
            {
                set6.add(j);
            }
        }
        
        //set7
        set7.add(6);
        set7.add(28);
        set7.add(496);
        set7.add(8128);
        
        // k=1 as we dont div by 0!
        for(int k=1; k<7; k++)
        {
            if(6%k==0)
            {
                if(!set7.contains(k))
                {
                set7.add(k);
                }
            }
        }
        
        for(int k=1; k<29; k++)
        {
            if(28%k==0)
            {
                if(!set7.contains(k))
                {
                set7.add(k);
                }
            }
        }
        
        for(int k=1; k<497; k++)
        {
            if(496%k==0)
            {
                if(!set7.contains(k))
                {
                set7.add(k);
                }
            }
        }
        
        for(int k=1; k<8129; k++)
        {
            if(8128%k==0)
            {
                if(!set7.contains(k))
                {
                set7.add(k);
                }
            }
        }
        
        //set8 - we stop at n == 46 as this is the limit for integer 1836311903, next incrementation exceeds it
        int temp1=1;
        int temp2=1;
        int fibo=0;
        
        for(int n=0; n<47; n++)
        {        
            if(n==0)
            {
                set8.add(0);
            }
            else if(n==1||n==2) 
            {
                set8.add(1);
            }
            else
            {
                set8.add(fibo=temp1+temp2);
                temp1=temp2;
                temp2=fibo;
            }
            
        }
        
        //1. set2 and set3
        Set<Integer> set9 = new HashSet<>();
        System.out.println("**************************************");
        System.out.println("TASK 1: ");
        set9 = SF.union(set2, set3);
        System.out.println("Union of set 2 and 3 is: "+set9);
        System.out.println("");
        
        //all elements that are either set4 and set5 
        Set<Integer> set10 = new HashSet<>();
        System.out.println("**************************************");        
        System.out.println("TASK 2: ");
        set10 = SF.intersection(set4, set5);
        System.out.println("Intersection of set 4 and 5 is: "+set10);
        System.out.println("");
        
        
        // set 10 is equal with set 6, set10 is subset of set6 = true
        System.out.println("**************************************");
        System.out.println("TASK 3: ");
        if(SF.isSubset(set10, set6))
        {
            System.out.println("Set10 equals set 6");
            System.out.println("");
        }
        else
        {
            System.out.println("Set10 doesnt equal set 6, it's not a subset of set6");
            System.out.println("");
        }
        System.out.println("**************************************");
        System.out.println("TASK 4: ");
        //remaning elements after removing set 5 from set 7
        Set<Integer> set11 = new HashSet<>();
        
        set11 = SF.difference(set7, set5);
        
        System.out.println("Elements remaining after removing set5 from set7: "+set11);
        System.out.println("");
        
        System.out.println("**************************************");
        System.out.println("TASK 5: ");
        //elements that are common between set2 and set3
        Set<Integer> set12 = new HashSet<>();
        
        set12 = SF.intersection(set2, set3);
        System.out.println("Elements common between set 2 and 3: "+set12);
        System.out.println("");
        
        System.out.println("**************************************");
        System.out.println("TASK 6: ");
        //elements that are common between set8 and 7
        Set<Integer> set13 = new HashSet<>();
        
        set13 = SF.intersection(set8, set7);
        System.out.println("Elements common between set 8 and 7: "+set13);
        System.out.println("");
        
        System.out.println("**************************************");
        System.out.println("TASK 7: ");
        //sum of all sets
        Set<Integer> set14 = new HashSet<>();
        
        set14.addAll(set1);
        set14.addAll(set2);
        set14.addAll(set3);
        set14.addAll(set4);
        set14.addAll(set5);
        set14.addAll(set6);
        set14.addAll(set7);
        set14.addAll(set8);
        
        System.out.println("Sum of all sets is: "+set14);
        System.out.println("");
        
        System.out.println("**************************************");
        System.out.println("TASK 8: ");
        //difference between set 1 and 8
        Set<Integer> set15 = new HashSet<>();
        
        set15 = SF.difference(set1, set8);
        
        System.out.println("Difference between set 1 and 8 is: "+set15);
        System.out.println("");
    }     
}
