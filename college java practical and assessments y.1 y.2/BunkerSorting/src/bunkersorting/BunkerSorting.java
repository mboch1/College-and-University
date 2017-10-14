package bunkersorting;
import becker.robots.*;

public class BunkerSorting 
{

    
    public static void main(String[] args) 
    {
        City ayr = new City("sorting.txt");
        
        SortBot karl = new SortBot(ayr, 0, 0, Direction.EAST);
        SortBot bob = new SortBot(ayr, 2, 0, Direction.EAST);
        SortBot jane = new SortBot(ayr, 4, 0, Direction.EAST);
        SortBot daryl = new SortBot(ayr, 6, 0, Direction.EAST);

        
        Thread t1 = new Thread(karl);
        Thread t2 = new Thread(bob);
        Thread t3 = new Thread(jane);
        Thread t4 = new Thread(daryl);
        
        t1.start();
        t2.start();
        t3.start();
        t4.start();  
    }
    
}
