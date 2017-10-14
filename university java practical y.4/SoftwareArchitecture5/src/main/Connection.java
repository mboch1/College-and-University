package main;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;

class Connection extends Thread {
	DataInputStream in;
	DataOutputStream out;
	Socket clientSocket;

	public Connection(Socket aClientSocket) {
		try {
			clientSocket = aClientSocket;
			in = new DataInputStream(clientSocket.getInputStream());
			out = new DataOutputStream(clientSocket.getOutputStream());
			this.start();
		} catch (IOException e) {
			System.out.println("Connection: " + e.getMessage());
		}
	}

	public void run() {
		try {
			String data = in.readUTF();
			System.out.println("Received: " + data);
			out.writeUTF(data);
		} catch (Exception e) {
			try {
				clientSocket.close();
			} catch (IOException ioe) {
				System.out.println("Error: " + ioe.getMessage());
			}
			System.out.println("Error: " + e.getMessage());
		}
	}
}
