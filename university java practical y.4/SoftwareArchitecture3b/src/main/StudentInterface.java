package main;

import java.rmi.*;

public interface StudentInterface extends Remote
{
	/**
	 * Gets the student name
	 * 
	 * @return The name of the student
	 * @throws RemoteException Thrown if problem in RMI
	 */
	public String getName() throws RemoteException;
	
	/**
	 * Changes the student name
	 * 
	 * @param name The new name for the student
	 * @throws RemoteException Thrown if problem in RMI
	 */
	public void setName(String name) throws RemoteException;
	
	/**
	 * Gets the student matric number
	 * 
	 * @return The matric number of the student
	 * @throws RemoteException Thrown if problem in RMI
	 */
	public String getMatric() throws RemoteException;
	
	/**
	 * Changes the student matric number
	 * 
	 * @param matric The new student matric number
	 * @throws RemoteException Thrown if problem with RMI
	 */
	public void setMatric(String matric) throws RemoteException;
	
	/**
	 * Gets the student programme
	 * 
	 * @return The student programme
	 * @throws RemoteException Thrown if problem with RMI
	 */
	public String getProgramme() throws RemoteException;
	
	/**
	 * Changes the student programme
	 * 
	 * @param programme The new student programme
	 * @throws RemoteException Thrown if problem with RMI
	 */
	public void setProgramme(String programme) throws RemoteException;
}
