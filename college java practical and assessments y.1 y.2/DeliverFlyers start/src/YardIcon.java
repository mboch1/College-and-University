import becker.robots.icons.*;
import java.awt.*;

public class YardIcon extends Icon
{
	public YardIcon()
	{	super();
	}
	
	public void paintIcon(Graphics g)
	{	g.setColor(Color.GREEN.darker());
		g.fillRect(0, 0, 100, 100);
	}
}
