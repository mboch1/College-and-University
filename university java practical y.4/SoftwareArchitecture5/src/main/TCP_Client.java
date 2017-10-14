package main;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.Socket;

public class TCP_Client {
	public static void main(String args[]) {
		Socket s = null;
		try {
			int serverPort = 7896;
			s = new Socket("127.0.0.1", serverPort);
			DataInputStream in = new DataInputStream(s.getInputStream());
			DataOutputStream out = new DataOutputStream(s.getOutputStream());
			out.writeUTF("hi"); // UTF is a string encoding format
			String data = in.readUTF();
			s.close();
			System.out.println("Received: " + data);
		} catch (Exception e) {
			System.out.println("Error:" + e.getMessage());
		}
	}
}
