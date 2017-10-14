package main;

import java.rmi.*;

public class RMIStudent implements StudentInterface
{
	// Properties of the student
	private String name;	
	private String matric;
	private String programme;
	
	public RMIStudent(String name, String matric, String programme)
	{
		this.name = name;
		this.matric = matric;
		this.programme = programme;
	}
	
	// Implement all the interface methods
	
	public String getMatric() throws RemoteException 
	{
		return matric;
	}

	public String getName() throws RemoteException 
	{
		return name;
	}

	public String getProgramme() throws RemoteException 
	{
		return programme;
	}

	public void setMatric(String matric) throws RemoteException 
	{
		this.matric = matric;
		System.out.println("Matric number changed to: " + this.matric);
	}

	public void setName(String name) throws RemoteException 
	{
		this.name = name;
		System.out.println("Name changed to: " + this.name);
	}

	public void setProgramme(String programme) throws RemoteException 
	{
		this.programme = programme;
		System.out.println("Programme changed to: " + this.programme);
	} 

}
