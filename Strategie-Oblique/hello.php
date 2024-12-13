<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */
/*
Plugin Name: Hello Oblique Dolly
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: The Hello Dolly Wordpress Plugin needs no introdctions. This version replaces the lyrics of the original song with strings from the Oblique system by Brian Eno and Peter Schmidt. A great little help while working...
Author: Matt Mullenweg
Version: 1.7.2
Author URI: http://ma.tt/
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "(Organic) machinery.
A line has two sides.
A very small object - Its centre.
Abandon desire.
Abandon normal instructions.
Accept advice.
Accretion.
Adding on.
Allow an easement (an easement is the abandonment of a stricture).
Always give yourself credit for having more than personality.
Always the first steps.
Animal noises.
Are there sections? Consider transitions.
Ask a computer program to repeat your last action.
Ask people to work against their better judgement.
Ask your body.
Assemble some of the elements in a group and treat the group.
Back up a few steps. What else could you have done?
Balance the consistency principle with the inconsistency principle.
Be dirty.
Be extravagant.
Be less critical more often.
Breathe more deeply.
Build bridges.
Burn bridges.
Call your mother and ask her what to do.
Cascades.
Change ambiguities to specifics.
Change instrument roles.
Change nothing and continue with immaculate consistency.
Change specifics to ambiguities.
Children’s voices singing.
Children’s voices speaking.
Cluster analysis.
Consider different fading systems.
Consider transitions.
Consult other promising sources.
Consult other unpromising sources.
Convert a melodic element into a rhythmic element.
Courage!
Credibility of intentions.
Cut a virtual connection.
Cut a vital connection.
Decorate, decorate.
Define an area as “safe” and use it as an anchor.
Describe the landscape in which this belongs.
Destroy nothing.
Destroy the most important thing.
Discard an axiom.
Disciplined self-indulgence.
Disconnect from desire.
Discover the recipes you are using and abandon them.
Discover your formulas and abandon them.
Display your talent.
Distorting time.
Do nothing for as long as possible.
Do something boring.
Do something sudden, destructive and unpredictable.
Do the last thing first.
Do the washing up.
Do the words need changing?
Do we need holes?
Don’t avoid what is easy.
Don’t be afraid of things because they’re easy to do.
Don’t be frightened of cliches.
Don’t be frightened to display your talents.
Don’t break the silence.
Don’t stress one thing more than another.
Earth.
Emphasize differences.
Emphasize repetitions.
Emphasize the flaws.
Faced with a choice, do both!
Feed the recording back out of the medium.
Feedback recordings into an acoustic situation.
Fill every beat with something.
Fire.
First work alone, then work in unusual pairs.
From nothing to more than nothing.
Get your neck massaged.
Ghost echoes.
Give the game away.
Give way to your worst impulse.
Go outside. Shut the door.
Go slowly all the way round the outside.
Go to an extreme, move back to a more comfortable place.
Heart.
How would someone else do it?
How would you explain this to your parents?
How would you have done it?
Humanize something that is free of error.
Humility of intentions.
Idiot glee.
Imagine the music as a moving chain or caterpillar.
Imagine the music as a series of disconnected events.
In a very large room, very quietly.
In total darkness.
Infinitesimal gradations.
Instead of changing the thing, change the world around it.
Is it finished?
Is something missing?
Is the intonation correct?
Is the style right?
Is the tuning appropriate?
It is quite possible (after all).
It is simply a matter or work.
Just carry on.
Left channel, right channel, centre channel.
List the qualities it has. List those you’d like.
Listen in a very large room, very quietly.
Listen in total darkness.
Listen to the quiet voice
Look at a very small object, look at its centre.
Look at the order in which you do things.
Look closely at the most embarrassing details and amplify.
Lost in useless territory.
Lowest common denominator check: single beat; single note; single riff.
Magnify the most difficult details.
Make a blank valuable by putting it in an excquisite frame.
Make a sudden, destructive unpredictable action. Incorporate.
Make an exhaustive list of everything you might do and do the last thing on the list.
Make it more banal.
Make it more sensual.
Make what’s perfect more human.
Mechanize something idiosyncratic.
Move towards the impossible.
Move towards the unimportant.
Mute and continue.
Nobility of intentions.
Not building a wall but making a brick.
Once the search is in progress, something will be found.
Only a part, not the whole.
Only one element of each kind.
Overtly resist change.
Pae White’s non-blank graphic metacard.
Pay attention to distractions.
Picture of a man spotlighted.
Put in earplugs.
Question the heroic approach.
Rearrange.
Remember those quiet evenings.
Remove a restriction.
Remove ambiguities and convert to specifics.
Remove specifics and convert to ambiguities.
Remove the middle, extend the edges.
Repetition is a form of change.
Retrace your steps.
Revaluation (a warm feeling).
Reverse.
Short circuit (example; a man eating peas with the idea that they will improve his virility shovels them straight into his lap).
Shut the door and listen from outside.
Simple subtraction.
Simply a matter of work.
Slow preparation, fast execution.
Spectrum analysis.
State the problem in words as simply as possible.
Steal a solution.
Take a break.
Take away as much mystery as possible. What is left?
Take away the elements in order of apparent non-importance.
Take away the important parts.
Tape your mouth.
The inconsistency principle.
The most important thing is the thing most easily forgotten.
The tape is now the music.
Think inside the work.
Think of the radio.
Think outside the work.
Tidy up.
Towards the insignificant.
Trust in the you of now.
Try faking it.
Turn it upside down.
Twist the spine.
Use an old idea.
Use an unacceptable color.
Use cliches.
Use fewer notes.
Use filters.
Use something nearby as a model.
Use your own ideas.
Use “unqualified” people.
Voice your suspicions.
Water.
What are the sections sections of? (Imagine a caterpillar moving).
What context would look right?
What do you do? Now, what do you do best?
What else is this like?
What is the reality of the situation?
What is the simplest solution?
What mistakes did you make last time?
What most recently impressed you? How is it similar? What can you learn from it? What could you take from it?
What to increase? What to reduce? What to maintain?
What were the branch points in the evolution of this entity?
What were you really thinking about just now? Incorporate.
What would make this really successful?
What would your closest friend do?
What wouldn’t you do? Do that.
When is it for?
When is it for? Who is it for?
Where is the edge?
Which parts can be grouped?
Who is it for?
Who would make this really successful?
Wind.
Work at a different speed.
Would anyone want it?
You are an engineer.
You can only make one dot at a time.
You don’t have to be ashamed of using your own ideas.
Your mistake was a hidden intention.";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello Dolly song, by Jerry Herman:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph.
function dolly_css() {
	echo "
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );
