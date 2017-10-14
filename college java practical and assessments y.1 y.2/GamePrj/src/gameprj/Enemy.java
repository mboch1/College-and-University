package gameprj;

public interface Enemy 
{
    String move(int x,int y,int z);
    String speak();
    String attack();
    String eventOnDeath();
    String heal();
}
