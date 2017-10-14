/*
 * Created by student id: 40270585, using javafx to build the creator menu scene
 * version 1: 06/11/2016
 * This is email viewer for the bank filtering service
 */
package nbmfs;

import java.io.FileReader;
import java.util.ArrayList;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

public class EmailViewer extends javax.swing.JFrame {

	private static final long serialVersionUID = 1L;
	private static boolean sirModule = false;
	private ArrayList<String> idArrayList = new ArrayList<>();
	private ArrayList<String> headerArrayList = new ArrayList<>();
	private ArrayList<String> dataArrayList = new ArrayList<>();
	private ArrayList<String> subjectArrayList = new ArrayList<>();
	private ArrayList<String> sortArrayList = new ArrayList<>();
	private ArrayList<String> sirArrayList = new ArrayList<>();
	private ArrayList<String> urlIdArrayList = new ArrayList<>();
	private ArrayList<String> urlArrayList = new ArrayList<>();
	/**
     * Creates new form NewJFrame
     */
    public EmailViewer() 
    {
        initComponents();
        if(sirModule==false)
        {
        	emailDatabaseReader();
        }
        if(sirModule==true)
        {
        	sirDatabaseReader();
        }
    }

	@SuppressWarnings("unchecked")
	public void emailDatabaseReader()
	{
		JSONParser parser1 = new JSONParser();
		 
        try {
        	
            Object obj = parser1.parse(new FileReader("StandardEmailDatabase.txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
           
            JSONArray idList = (JSONArray) jsonObject.get("id");
            JSONArray headerList = (JSONArray) jsonObject.get("header");
            JSONArray dataList = (JSONArray) jsonObject.get("data");
            JSONArray subjectList = (JSONArray) jsonObject.get("subject");
            
            idArrayList.addAll(idList);
            headerArrayList.addAll(headerList);
            dataArrayList.addAll(dataList);
            subjectArrayList.addAll(subjectList);     
        }
        
        catch (Exception e) 
        {
            e.printStackTrace();
        }
        
        //get sanitized URL list:
		JSONParser parser2 = new JSONParser();
		
        try {
        	
            Object obj = parser2.parse(new FileReader("URLDatabase.txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
           
            JSONArray idList = (JSONArray) jsonObject.get("id");
            JSONArray headerList = (JSONArray) jsonObject.get("url");
            
            urlIdArrayList.addAll(idList);
            urlArrayList.addAll(headerList);
 
        }
        
        catch (Exception e) 
        {
            e.printStackTrace();
        } 
        
        
        //show id and sender:
        for(int i = 0; i<idArrayList.size(); i++)
        {
        	String id_sender = i+"."+" id: "+idArrayList.get(i)+" sent by: "+headerArrayList.get(i);
        	jTextArea1.append(id_sender+"\n");
        }
        
        //show id and subject:
        for(int i = 0; i<idArrayList.size(); i++)
        {
        	String data =i+"."+"id: "+idArrayList.get(i)+" subject: "+subjectArrayList.get(i);
        	jTextArea2.append(data+"\n");
        }  
        
        //show id and text data:
        for(int i = 0; i<idArrayList.size(); i++)
        {
        	String data =i+"."+"id: "+idArrayList.get(i)+" data: "+dataArrayList.get(i);
        	jTextArea3.append(data+"\n");
        } 
        //show id and text data:
        for(int i = 0; i<urlIdArrayList.size(); i++)
        {
        	String data =i+"."+"id: "+urlIdArrayList.get(i)+" data: "+urlArrayList.get(i);
        	jTextArea4.append(data+"\n");
        }
        
        jTextArea5.append("This is available for\nSIR email type only");
	}
    
	@SuppressWarnings("unchecked")
	public void sirDatabaseReader()
	{
		JSONParser parser1 = new JSONParser();
		 
        try {
        	
            Object obj = parser1.parse(new FileReader("SIREmailDatabase.txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
           
            JSONArray idList = (JSONArray) jsonObject.get("id");
            JSONArray headerList = (JSONArray) jsonObject.get("header");
            JSONArray dataList = (JSONArray) jsonObject.get("data");
            JSONArray subjectList = (JSONArray) jsonObject.get("subject");
            JSONArray sortcodeList = (JSONArray) jsonObject.get("sort");
            JSONArray sirList = (JSONArray) jsonObject.get("sir");

            idArrayList.addAll(idList);
            headerArrayList.addAll(headerList);
            dataArrayList.addAll(dataList);
            subjectArrayList.addAll(subjectList);  
            sortArrayList.addAll(sortcodeList);
            sirArrayList.addAll(sirList); 
        }
        
        catch (Exception e) 
        {
            e.printStackTrace();
        }
        
        //get sanitised URL list:
		JSONParser parser2 = new JSONParser();
		
        try {
        	
            Object obj = parser2.parse(new FileReader("URLDatabase.txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
           
            JSONArray idList = (JSONArray) jsonObject.get("id");
            JSONArray headerList = (JSONArray) jsonObject.get("url");
            
            urlIdArrayList.addAll(idList);
            urlArrayList.addAll(headerList);
 
        }
        
        catch (Exception e) 
        {
            e.printStackTrace();
        } 
        
        //show id and sender:
        for(int i = 0; i<idArrayList.size(); i++)
        {
        	String id_sender = i+"."+" id: "+idArrayList.get(i)+" sent by: "+headerArrayList.get(i);
        	jTextArea1.append(id_sender+"\n");
        }
        
        //show id and subject:
        for(int i = 0; i<idArrayList.size(); i++)
        {
        	String data =i+"."+"id: "+idArrayList.get(i)+" subject: "+subjectArrayList.get(i);
        	jTextArea2.append(data+"\n");
        }  
        
        //show id and text data:
        for(int i = 0; i<idArrayList.size(); i++)
        {
        	String data =i+"."+"id: "+idArrayList.get(i)+" data: "+dataArrayList.get(i);
        	jTextArea3.append(data+"\n");
        } 
        
        //show id and text data:
        for(int i = 0; i<urlIdArrayList.size(); i++)
        {
        	String data =i+"."+"URL ID: "+urlIdArrayList.get(i)+" data: "+urlArrayList.get(i);
        	jTextArea4.append(data+"\n");

        }
        
        //show bank sort code and nature of incident:
        for(int i = 0; i<sortArrayList.size(); i++)
        {
        	String data =i+"."+"Sort Code: "+sortArrayList.get(i)+" SIR: "+sirArrayList.get(i);
        	jTextArea5.append(data+"\n");
        }
	}
    
    
    
    
    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    
    // <editor-fold defaultstate="collapsed" desc="Generated Code">                          
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel7 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTextArea1 = new javax.swing.JTextArea();
        jScrollPane2 = new javax.swing.JScrollPane();
        jTextArea2 = new javax.swing.JTextArea();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jScrollPane3 = new javax.swing.JScrollPane();
        jTextArea3 = new javax.swing.JTextArea();
        jLabel3 = new javax.swing.JLabel();
        jScrollPane4 = new javax.swing.JScrollPane();
        jTextArea4 = new javax.swing.JTextArea();
        jScrollPane5 = new javax.swing.JScrollPane();
        jTextArea5 = new javax.swing.JTextArea();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 100, Short.MAX_VALUE)
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 100, Short.MAX_VALUE)
        );

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);

        jLabel7.setFont(new java.awt.Font("Tahoma", 0, 24)); // NOI18N
        jLabel7.setText("Welcome to the Napier Bank Message Filtering Service");

        jLabel11.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel11.setText("Standard and SIR email viewer:");

        jTextArea1.setColumns(20);
        jTextArea1.setRows(5);
        jTextArea1.setEditable(false);
        jScrollPane1.setViewportView(jTextArea1);

        jTextArea2.setColumns(20);
        jTextArea2.setRows(5);
        jTextArea2.setEditable(false);
        jScrollPane2.setViewportView(jTextArea2);

        jLabel1.setText("ID & subject:");

        jLabel2.setText("ID & email address:");

        jTextArea3.setColumns(20);
        jTextArea3.setRows(5);
        jTextArea3.setEditable(false);
        jScrollPane3.setViewportView(jTextArea3);

        jLabel3.setText("ID & data:");

        jTextArea4.setColumns(20);
        jTextArea4.setRows(5);
        jTextArea4.setEditable(false);
        jScrollPane4.setViewportView(jTextArea4);

        jTextArea5.setColumns(20);
        jTextArea5.setRows(5);
        jTextArea5.setEditable(false);
        jScrollPane5.setViewportView(jTextArea5);

        jLabel4.setText("ID & url address: ");

        jLabel5.setText("Sort code & serious incident report: ");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(43, 43, 43)
                        .addComponent(jLabel7))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(23, 23, 23)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jLabel2)
                            .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 230, Short.MAX_VALUE)
                            .addComponent(jLabel11)
                            .addComponent(jLabel1)
                            .addComponent(jScrollPane2)
                            .addComponent(jLabel3)
                            .addComponent(jScrollPane3))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jScrollPane4, javax.swing.GroupLayout.PREFERRED_SIZE, 200, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel4))
                        .addGap(33, 33, 33)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jScrollPane5, javax.swing.GroupLayout.PREFERRED_SIZE, 200, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel5))))
                .addContainerGap(36, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(7, 7, 7)
                .addComponent(jLabel7)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel11)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(jLabel4)
                    .addComponent(jLabel5))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jLabel1)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jScrollPane4, javax.swing.GroupLayout.PREFERRED_SIZE, 218, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel3))
                    .addComponent(jScrollPane5, javax.swing.GroupLayout.PREFERRED_SIZE, 218, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>                        

    /**
     * @param args the command line arguments
     */
    public static void standard_email_run_viewer() {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new EmailViewer().setVisible(true);
            }
        });
    }

    public static void sir_email_run_viewer() {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(EmailViewer.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        sirModule = true;
        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new EmailViewer().setVisible(true);
            }
        });
    }
    // Variables declaration - do not modify                     
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JScrollPane jScrollPane4;
    private javax.swing.JScrollPane jScrollPane5;
    private javax.swing.JTextArea jTextArea1;
    private javax.swing.JTextArea jTextArea2;
    private javax.swing.JTextArea jTextArea3;
    private javax.swing.JTextArea jTextArea4;
    private javax.swing.JTextArea jTextArea5;
    // End of variables declaration                   
}
