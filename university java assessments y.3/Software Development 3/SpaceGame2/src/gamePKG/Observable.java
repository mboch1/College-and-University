package gamePKG;

public interface Observable 
{
	public void registerObserver(Board o);
	public void removeObserver(Board o);
	public void notifyObservers();
	void notifyObservers(int latestTurn);
	void notifyObservers(String shipType);
}
