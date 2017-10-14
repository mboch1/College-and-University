package set10101.ipc;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;

/**
 * Usage:
 * 1)cd C:\\Users\\user\workspace\\SET10101\\bin
 * 2)java set10101.ipc.TCP_Server
 * 
 * @author Dr Lu Fan
 *
 */
public class TCP_Server {
	public static void main (String args[]) {
		try {
			int serverPort = 7896;
			ServerSocket listenSocket = new ServerSocket(serverPort);
			while(true) {
				Socket clientSocket = listenSocket.accept();
				Connection c = new Connection(clientSocket);
			}
		} 
		catch(IOException e) {
			System.out.println("Listen: " + e.getMessage());
		}
	}
}
