/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package counting;

/**
 *
 * @author ec1401916
 */
class count 
{   
    
    public void countus(int counter)
    {
        if(counter == 0)
        {
            return;
        }
        else
        {
            System.out.println(" "+counter);
            countus(counter--);
        }
    }
}
