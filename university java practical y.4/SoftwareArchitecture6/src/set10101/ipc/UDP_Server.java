package set10101.ipc;

import java.net.DatagramPacket;
import java.net.DatagramSocket;

/**
 * 
 * Usage:
 * 1)cd C:\\Users\\user\workspace\\SET10101\\bin
 * 2)java set10101.ipc.UDP_Server
 * 
 * @author Dr Lu Fan
 *
 */
public class UDP_Server {

	public static void main(String args[]) {
		DatagramSocket aSocket = null;
		try {
			aSocket = new DatagramSocket(6789);
			byte[] buffer = new byte[1000];
			while(true){
				DatagramPacket request =
						new DatagramPacket(buffer, buffer.length);
				aSocket.receive(request);
				System.out.println("Received: " + new String(request.getData(),
						0, request.getLength()));
				DatagramPacket reply = new DatagramPacket(request.getData(),
						request.getLength(), request.getAddress(),
						request.getPort());
				aSocket.send(reply);	   	
			}
		} catch (Exception e){
			aSocket.close();
			System.out.println("Socket: " + e.getMessage());
		}
	}	
}
