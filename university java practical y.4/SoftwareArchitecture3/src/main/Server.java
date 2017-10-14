package main;

import java.io.*;
import java.net.*;
import java.util.*;

public class Server 
{
	public static void main(String[] args)
	{
		try
		{
			// First create the input from the keyboard
			BufferedReader input = new BufferedReader(new InputStreamReader(System.in));
			System.out.println("Server Program");
			
			// Get the port to listen on
			System.out.print("Enter port number to listen on: ");
			String port_string = input.readLine();
			
			// The port number needs to be an int, so convert the String to an int
			int port = Integer.parseInt(port_string);
			
			// Create a ServerSocket to listen on this address
			ServerSocket server = new ServerSocket(port);
			
			// Accept an incoming client connection on the server socket
			Socket sock = server.accept();
			
			// Create the output stream to the client
			DataOutputStream network = new DataOutputStream(sock.getOutputStream());
			//read from clients:
			DataInputStream net = new DataInputStream(sock.getInputStream());
			System.out.println(net.readUTF());
			// Send message
			network.writeUTF("Welcome " + sock.getInetAddress().getHostName() + ". We are " + new Date() + "\n");
			for(int i=0; i<100; i++)
			network.writeUTF("Hi");
			// Close sockets.  This will cause the client to exit
			sock.close();
			server.close();
		}
		catch (IOException ioe)
		{
			System.err.println("Error in I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
	}
}
