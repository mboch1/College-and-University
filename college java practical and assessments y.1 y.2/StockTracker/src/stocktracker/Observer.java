
package stocktracker;

/**
 *
 * @author mb
 */
public abstract class Observer 
{
   protected Subject subject;
   public abstract void update();
}
