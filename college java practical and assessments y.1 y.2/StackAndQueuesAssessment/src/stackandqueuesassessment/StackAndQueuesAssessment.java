package stackandqueuesassessment;

import java.io.*;
import java.util.*;
import java.util.concurrent.*;

/**
 *
 * @author Michal Bochenek
 */

public class StackAndQueuesAssessment 
{

    public static void main(String[] args) throws InterruptedException 
    {
        //global variables to be used later
        //pod 1 and 2 with cargo loaded
        Stack<String> pod1 = new Stack<>();  
        Stack<String> pod2 = new Stack<>();
        //this is the corridor queue at the space station max 18 items are allowed
        BlockingQueue<String> corridor = new ArrayBlockingQueue<>(18);
        //cargo bay
        ArrayList<String> food = new ArrayList<>();
        ArrayList<String> technical = new ArrayList<>();        
        ArrayList<String> personal = new ArrayList<>(); 
        //other
        int option;
        
        
        System.out.println("This is cargo sorting program.");
        System.out.println("Choose an option by pressing number 1 or 2 and press ENTER:");
        System.out.println("1. Program test with PodData.txt or data run 1/2");
        System.out.println("2. Generate cargo data.");
        System.out.println("Exit - none or any other value");
        
        Scanner sd = new Scanner(System.in);
        option = sd.nextInt();
        
        if(option==2)
        {
        //generate cargo
        //this is our cargo which will be loaded to the pod 1 and 2 respectively
        Set<String> cargo1 =  new HashSet<>();
        Set<String> cargo2 =  new HashSet<>();
        
        LoadPods genload = new LoadPods(cargo1, cargo2);
        genload.LoadPods();  

        //load pods with data
        cargo1.addAll(genload.car1);
        cargo2.addAll(genload.car2);
        
        //start sorting
        Sorting generator = new Sorting();
        generator.option2(cargo1, cargo2);
        
        }
        
        else if(option==1)
        {
        //testing program with txt files or run data 1/2
        Sorting txtfile = new Sorting();
        txtfile.option1();
        }
    }   
}
