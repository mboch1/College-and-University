package gamePKG;

import java.awt.EventQueue;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.border.BevelBorder;
import java.awt.Color;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JRadioButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.ButtonGroup;
import javax.swing.JTextField;
import javax.swing.JTextArea;
import java.awt.Font;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.util.ArrayList;

public class Board extends JFrame implements Observer, DisplayElement {

	private static final long serialVersionUID = 1L;
	
	//GUI elements and variables pre-initialization
	private JPanel contentPane;
	private final ButtonGroup buttonGroup = new ButtonGroup();
	private JButton btnNextTurn;
	private JButton btnUndoMove;
	private JRadioButton rdbtnDefensiveMode;
	private JRadioButton rdbtnOffensiveMode;
	private JTextField turnCounter;
	private JTextField gameScore;
	private JTextArea gameHistory;
	@SuppressWarnings("unused")
	private String observerName;
	private String shipType;
	private int updatedValue;
	private Board frame;
	//ArrayList holding existing 'pawns' in game:
	public ArrayList<Ships> shipsList = new ArrayList<>();
	//game board painter:
	private GameCanvas canvas = new GameCanvas(shipsList);
	//game logics:
	private GameRunner game = new GameRunner(shipsList);
	//battle behaviour strategy switcher:
	public ShipBattleBehaviourContext battle = new ShipBattleBehaviourContext();
	//turn history tracking array:
	private ArrayList<ShipMoveHistory> turnHistory= new ArrayList<>();
	
	// ***********THIS IS OBSERVER CODE SECTION*****************
	private void setObsName(String observerName)
	{
		this.observerName = observerName;
	}
	
	//set this observer to the current game runner
	private void setGameRunner(GameRunner gameRunner)
	{
		//this.game = gameRunner;
		this.game.registerObserver(this);
	}
	
	//update news of type of ship being spawned
	@Override
	public void update(String shipSpawned) 
	{
		this.shipType = shipSpawned;
		//display in GUI
		display(shipType);
	}
	//game turn update
	@Override
	public void update(int latestUpdate) 
	{
		this.updatedValue = latestUpdate;
		//display in GUI
		display(updatedValue);
	}
	//unused but required
	@Override
	public void display() {
		// TODO Auto-generated method stub
		
	}
	//display turn number in gui:
	@Override
	public void display(int updatedValue) 
	{
		String turn =Integer.toString(updatedValue);
		turnCounter.setText(turn);
	}
	//display game history update:
	@Override
	public void display(String shipType) 
	{
		if(shipType == null)
		{
			gameHistory.append("No ship was spawned\n");
		}
		if(shipType!=null)
		{
			gameHistory.append("A new ship "+shipType+" was spawned\n");
		}
	}
	// ***********THIS IS THE END*****************

	/**
	 * Launch the application.
	 */
	
	public void runPainter()
	{
		canvas.repaint();
		canvas.setVisible(true);
		
		if(updatedValue>=2)
		{
			btnUndoMove.setEnabled(true);
		}
		else
		{
			btnUndoMove.setEnabled(false);
		}
		
	}
	
	public void startGame() {
		
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {		
					frame = new Board();
					//register turn observer here (can't be done in main class):
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	
	/**
	 * Create the frame.
	 */
	public Board() 
	{
		//create observer for game runner, whose data will be used in GUI:
		setObsName("Observer1");
		setGameRunner(game);
		
		setTitle("Space Defender");
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 800, 600);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(255, 255, 224));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JPanel gameWindow = new JPanel();
		gameWindow.setBackground(new Color(173, 216, 230));
		gameWindow.setBorder(new BevelBorder(BevelBorder.LOWERED, new Color(25, 25, 112), new Color(244, 164, 96), new Color(106, 90, 205), new Color(244, 164, 96)));
		gameWindow.setBounds(350, 50, 400, 400);
		contentPane.add(gameWindow);
		
		
		//next turn
		btnNextTurn = new JButton("Next Turn");
		btnNextTurn.setEnabled(false);
		btnNextTurn.addMouseListener(new MouseAdapter() 
		{
			@Override
			public void mouseClicked(MouseEvent e) 
			{
				//SAVE CURRENT STATUS TO ARRAYLIST
				turnHistory.add(new ShipMoveHistory(shipsList));
				//EXECUTE NEXT TURN AND INFORM OBSERVER
				game.nextTurn(shipsList, game, battle);
				//LOAD NEW MAP STATUS AND PAINT IT:
				runPainter();
				//UPDATE TURN STATUS OBJECT
				//turnHistory.add(new ShipMoveHistory(shipsList));
				
				if(updatedValue>=2)
				{
					btnUndoMove.setEnabled(true);
				}
				else
				{
					btnUndoMove.setEnabled(false);
				}
				
			}
		});
		btnNextTurn.setBounds(571, 461, 89, 23);
		contentPane.add(btnNextTurn);
		
		//undo movement
		btnUndoMove = new JButton("Undo Move");
		btnUndoMove.setEnabled(false);
		btnUndoMove.addActionListener(new ActionListener() 
		{
			public void actionPerformed(ActionEvent e) 
			{	
				shipsList.removeAll(shipsList);
				if(shipsList.size()==0)
				{		
					shipsList.addAll(turnHistory.get(turnHistory.size()-1).getClonedShipList());					
					int k = turnHistory.size()-1;
					turnHistory.remove(k);
					updatedValue = updatedValue-1;
					String turn =Integer.toString(updatedValue);
					turnCounter.setText(turn);
					runPainter();
				}
			}
		});
		btnUndoMove.setBounds(460, 461, 89, 23);
		contentPane.add(btnUndoMove);
		

		
		//set ship into offensive mode
		rdbtnOffensiveMode = new JRadioButton("Offensive");
		rdbtnOffensiveMode.setBackground(new Color(255, 255, 224));
		rdbtnOffensiveMode.setEnabled(false);
		rdbtnOffensiveMode.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) 
			{
				battle.setShipBattleBehaviour(new AggressiveBehaviour());	
			}
		});
		buttonGroup.add(rdbtnOffensiveMode);
		rdbtnOffensiveMode.setBounds(571, 505, 109, 23);
		contentPane.add(rdbtnOffensiveMode);
		
		//set ship into default defensive mode
		rdbtnDefensiveMode = new JRadioButton("Defensive");
		rdbtnDefensiveMode.setBackground(new Color(255, 255, 224));
		rdbtnDefensiveMode.setEnabled(false);
		rdbtnDefensiveMode.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) 
			{
				battle.setShipBattleBehaviour(new DefensiveBehaviour());
			}
		});
		rdbtnDefensiveMode.setSelected(true);
		buttonGroup.add(rdbtnDefensiveMode);
		rdbtnDefensiveMode.setBounds(460, 505, 109, 23);
		contentPane.add(rdbtnDefensiveMode);
		
		//turn counter view
		turnCounter = new JTextField();
		turnCounter.setText("");
		turnCounter.setEditable(false);
		turnCounter.setBounds(10, 150, 30, 20);
		contentPane.add(turnCounter);
		turnCounter.setColumns(10);
		
		//game score
		gameScore = new JTextField();
		gameScore.setText("");
		gameScore.setEditable(false);
		gameScore.setBounds(10, 200, 25, 20);
		contentPane.add(gameScore);
		gameScore.setColumns(10);
		
		//game history viewer
		gameHistory = new JTextArea();
		gameHistory.setFont(new Font("Consolas", Font.PLAIN, 12));
		gameHistory.setToolTipText("Current Game History");
		
		gameHistory.setBackground(new Color(240, 230, 140));
		gameHistory.setEditable(false);
		gameHistory.setBounds(140, 50, 200, 400);
		contentPane.add(gameHistory);
		
		//JScrollPane scroll = new JScrollPane(gameHistory);
        //scroll.setBounds(140, 50, 200, 400); 
		
		JLabel lblGameControls = new JLabel("Game Controls:");
		lblGameControls.setBounds(360, 465, 90, 14);
		contentPane.add(lblGameControls);
		
		JLabel lblStartNewGame = new JLabel("Start New Game:");
		lblStartNewGame.setBounds(10, 25, 120, 14);
		contentPane.add(lblStartNewGame);
		
		JLabel lblTurnsPassed = new JLabel("Turns passed:");
		lblTurnsPassed.setBounds(10, 125, 86, 14);
		contentPane.add(lblTurnsPassed);
		
		JLabel lblShipsDestroyed = new JLabel("Ships destroyed:");
		lblShipsDestroyed.setBounds(10, 175, 89, 14);
		contentPane.add(lblShipsDestroyed);
		
		JLabel lblShipStatus = new JLabel("Ship Status: ");
		lblShipStatus.setBounds(360, 509, 90, 14);
		contentPane.add(lblShipStatus);
		
		JLabel lblGameWindow = new JLabel("Game window:");
		lblGameWindow.setBounds(350, 25, 125, 14);
		contentPane.add(lblGameWindow);
				
		JLabel lblGameHistory = new JLabel("Game history:");
		lblGameHistory.setBounds(140, 25, 125, 14);
		contentPane.add(lblGameHistory);
		
		//start a new game
		JButton btnStartGame = new JButton("Start");
		btnStartGame.addMouseListener(new MouseAdapter() 
		{
			@Override
			public void mouseClicked(MouseEvent e) 
			{
				btnNextTurn.setEnabled(true);
				rdbtnOffensiveMode.setEnabled(true);
				rdbtnDefensiveMode.setEnabled(true);
				//disable button while game lasts
				btnStartGame.setEnabled(false);
				//set default battle behaviour:
				battle.setShipBattleBehaviour(new DefensiveBehaviour());
				//create canvas on the jpanel [take whole window 400x400px]
				canvas.setBounds(10, 10, 380, 380);
				canvas.setVisible(true);
				gameWindow.add(canvas);
				new Thread(r).start();
			}
		});
		btnStartGame.setToolTipText("Begin new game here");
		btnStartGame.setBounds(10, 50, 89, 23);
		contentPane.add(btnStartGame);
	}
	
	//game over thread:
	Runnable r = new Runnable()
	{
		public void run() 
		{
			boolean flag=false;
			//run this thread while game is not finished:
			while(flag==false)
			{
				boolean gameOverFlag = game.getFlagState();
				Thread.currentThread().getState();
				if(gameOverFlag==true)
				{
					btnNextTurn.setEnabled(false);
					btnUndoMove.setEnabled(false);
					JOptionPane.showMessageDialog(null, "The ship was destroyed by overwhelming alien forces!!!");
					flag = true;
					
					Thread.currentThread().interrupt();
				}
			}
		}
	};

	    

}
