package gameprj;

public class Dragon implements Enemy
{

    @Override
    public String move(int x, int y, int z) 
    {
        return  "Dragon at (1,2,3)";
    }

    @Override
    public String speak() 
    {
        return  "Yo DAWG";
    }

    @Override
    public String attack() 
    {
        return  "-100HP";
    }

    @Override
    public String eventOnDeath() 
    {
        return  "Whyyyyy?";
    }

    @Override
    public String heal() 
    {
        return  "Dragon has healed";
    }
    
}
