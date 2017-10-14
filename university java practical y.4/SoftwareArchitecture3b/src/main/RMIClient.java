package main;

import java.io.*;
import java.rmi.*;
import java.rmi.registry.*;

public class RMIClient 
{
	public static void main(String[] args)
	{
		try
		{
			// Set up keyboard input
			BufferedReader input = new BufferedReader(new InputStreamReader(System.in));
			System.out.println("RMI Client Program");
			
			// Get IP address of the RMI Registry
			System.out.print("Enter IP address of RMI Registry: ");
			String ip = input.readLine();
			
			// Connect to the registry
			Registry registry = LocateRegistry.getRegistry(ip);
			
			// Get the remotely declared student object
			StudentInterface student = (StudentInterface)registry.lookup("student");
			
			// Display the current student details
			System.out.println("Student details:");
			System.out.println("Name: " + student.getName());
			System.out.println("Matric: " + student.getMatric());
			System.out.println("Programme: " + student.getProgramme());
			
			// Change the student details
			System.out.print("Enter new student name: ");
			String name = input.readLine();
			student.setName(name);
			System.out.print("Enter new student matric: ");
			String matric = input.readLine();
			student.setMatric(matric);
			System.out.print("Enter new student programme: ");
			String programme = input.readLine();
			student.setProgramme(programme);
		}
		catch (IOException ioe)
		{
			System.err.println("Error in I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
		catch (NotBoundException nbe)
		{
			System.err.println("Object not declared on RMI Registry");
			System.err.println(nbe.getMessage());
			System.exit(-1);
		}
	}
}
