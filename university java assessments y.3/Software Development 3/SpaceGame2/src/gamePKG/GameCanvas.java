package gamePKG;

import java.awt.Canvas;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.util.ArrayList;

import javax.imageio.ImageIO;

public class GameCanvas extends Canvas
{

	private static final long serialVersionUID = 1L;
	ArrayList<Ships> shipsList = new ArrayList<>();
	int pMapX;
	int pMapY;
	
	public GameCanvas(ArrayList<Ships> shipList)
	{
		shipsList = shipList;
	}
	
	//draws a new clear board on canvas
	public void paint(Graphics g) 
	{
		
		Graphics2D g2d = (Graphics2D) g;

		g2d.setColor(Color.BLACK);
        g2d.drawLine(95, 0, 95, 380);
        g2d.drawLine(190, 0, 190, 380);
        g2d.drawLine(285, 0, 285, 380);
        g2d.drawLine(0, 95, 380, 95);
        g2d.drawLine(0, 190, 380, 190);
        g2d.drawLine(0, 285, 380, 285);
        g2d.setColor(Color.LIGHT_GRAY);
        g2d.fillOval(0, 0, 85, 85);
        g2d.setColor(Color.WHITE);
        g2d.fillOval(20, 20, 45, 45);
        g2d.setColor(Color.LIGHT_GRAY);
        g2d.fillOval(30, 30, 25, 25);
		//paintBoard(g);
        if(shipsList.size()>0)
        {
        	paintShips(g);
        }
        //put a method here to draw ships on the map on each repaint:
        
        //OLD this.paintPlayerShip(g);
        
	}
	
	//*************** GRAPHICS LOADER *******************
	//battlestar:
	public BufferedImage alienCraft1(Graphics g) 
	{	
		try {
			String plShip = "battleStar.png";
			File imageSrc = new File(plShip);
			BufferedImage img;
			img = ImageIO.read(imageSrc);
			return img;
		} 
		catch (IOException e) 
		{
			e.printStackTrace();
		} 
		return null;
	}
	//battlecruiser:
	public BufferedImage alienCraft2(Graphics g) 
	{		
		try {
			String plShip = "battleCruiser.png";
			File imageSrc = new File(plShip);
			BufferedImage img;
			img = ImageIO.read(imageSrc);
			return img;
		} 
		catch (IOException e) 
		{
			e.printStackTrace();
		} 
		return null;
	}
	//battleshooter:
	public BufferedImage alienCraft3(Graphics g) 
	{	
		try {
			String plShip = "battleShooter.png";
			File imageSrc = new File(plShip);
			BufferedImage img;
			img = ImageIO.read(imageSrc);
			return img;
		} 
		catch (IOException e) 
		{
			e.printStackTrace();
		} 
		return null;
	}
	public BufferedImage playerCraft(Graphics g) 
	{
		try {
			String plShip = "playerShip.png";
			File imageSrc = new File(plShip);
			BufferedImage img;
			img = ImageIO.read(imageSrc);
			return img;
		} 
		catch (IOException e) 
		{
			e.printStackTrace();
		} 
		return null;
	}
	//*************** END OF LOADER *******************
	
	//draws player ship first time on canvas
	public void paintShips(Graphics g)
	{	
		if(shipsList.size()>0)
		{
			Graphics2D g2d = (Graphics2D) g;
			
			for(int i=0; i<shipsList.size(); i++)
			{
				if(shipsList.get(i).type().equalsIgnoreCase("player"))
				{
					g2d.drawImage(playerCraft(g), getShipX(shipsList.get(i).getX()) , getShipY(shipsList.get(i).getY()), null); 
				}
				if(shipsList.get(i).type().equalsIgnoreCase("battlestar"))
				{
					g2d.drawImage(alienCraft1(g), getShipX(shipsList.get(i).getX()) , getShipY(shipsList.get(i).getY()), null); 
				}
				if(shipsList.get(i).type().equalsIgnoreCase("battlecruiser"))
				{
					g2d.drawImage(alienCraft2(g), getShipX(shipsList.get(i).getX()) , getShipY(shipsList.get(i).getY()), null); 
				}
				if(shipsList.get(i).type().equalsIgnoreCase("battleshooter"))
				{
					g2d.drawImage(alienCraft3(g), getShipX(shipsList.get(i).getX()) , getShipY(shipsList.get(i).getY()), null); 
				}
			}
		}
	}	

	//use this to convert map location to graphical map location cell:
	public int getShipX(int x)
	{
		int mapX = x*95;
		return  mapX;
	}
	public int getShipY(int y)
	{
		int mapY = y*95;
		return  mapY;
	}
}

