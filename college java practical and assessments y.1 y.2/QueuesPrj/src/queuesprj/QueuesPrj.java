package queuesprj;

import java.util.*;
import java.util.concurrent.BlockingQueue;
import java.util.concurrent.ArrayBlockingQueue;



public class QueuesPrj 
{


    public static void main(String[] args) 
    {
        int number;
        
        BlockingQueue<Integer> q = new ArrayBlockingQueue<Integer>(10);
        
        //to add
        q.add(12);
        q.add(121);
        q.add(1212);
        q.add(12121);
        q.add(121212);
        q.add(1212121);
        q.add(12121212);
        q.add(121212121);
        q.add(1212121212);
        q.add(1212121210);
        
        //to see
        System.out.println(q);
        
        number = q.remove();
        
        q.add(33);
        
        System.out.println(q);
        
        System.out.println("Q size: "+q.size());

        
    }
    
}
