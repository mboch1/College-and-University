
import becker.robots.*;

public class DeliverFlyers 
{

   
    public static void main(String[] args) 
    {
     Route route = new Route();
           
        DeliveryBot db1 = new DeliveryBot(route, 0, 0, Direction.EAST, 6);
        DeliveryBot db2 = new DeliveryBot(route, 6, 0, Direction.EAST, 6);
        DeliveryBot db3 = new DeliveryBot(route, 5, 5, Direction.WEST, 6);
        DeliveryBot db4 = new DeliveryBot(route, 11, 5, Direction.WEST, 6);
        DeliveryBot db5 = new DeliveryBot(route, 0, 6, Direction.EAST, 6);
        DeliveryBot db6 = new DeliveryBot(route, 6, 6, Direction.EAST, 6);
        DeliveryBot db7 = new DeliveryBot(route, 5, 11, Direction.WEST, 6);
        DeliveryBot db8 = new DeliveryBot(route, 11, 11, Direction.WEST, 6);
  
        
        Thread t1 = new Thread((Runnable) db1);
        Thread t2 = new Thread((Runnable) db2);
        Thread t3 = new Thread((Runnable) db3);
        Thread t4 = new Thread((Runnable) db4);
        Thread t5 = new Thread((Runnable) db5);
        Thread t6 = new Thread((Runnable) db6);
        Thread t7 = new Thread((Runnable) db7);
        Thread t8 = new Thread((Runnable) db8);
        
        t1.start();
        t2.start();
        t3.start();
        t4.start();        
        t5.start();
        t6.start(); 
        t7.start();
        t8.start();        
    }
}
