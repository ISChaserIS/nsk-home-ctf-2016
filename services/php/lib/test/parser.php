<?php

	$parser = ".";
/*
Parsing or syntactic analysis is the process of analysing a string of symbols, either in natural language or in computer languages, conforming 
to the rules of a formal grammar. The term parsing comes from Latin pars (orationis), meaning part (of speech).[1][2]

The term has slightly different meanings in different branches of linguistics and computer science. Traditional sentence parsing is often performed 
as a method of understanding the exact meaning of a sentence or word, sometimes with the aid of devices such as sentence diagrams. It usually emphasizes
 the importance of grammatical divisions such as subject and predicate.

Within computational linguistics the term is used to refer to the formal analysis by a computer of a sentence or other string of words into its
 constituents, resulting in a parse tree showing their syntactic relation to each other, which may also contain semantic and other information.

The term is also used in psycholinguistics when describing language comprehension. In this context, parsing refers to the way that human beings analyze 
a sentence or phrase (in spoken language or text) "in terms of grammatical constituents, identifying the parts of speech, syntactic relations, etc."[2] 
This term is especially common when discussing what linguistic cues help speakers to interpret garden-path sentences.

Within computer science, the term is used in the analysis of computer languages, referring to the syntactic analysis of the input code into its component 
parts in order to facilitate the writing of compilers and interpreters. The term may also be used to describe a split or separation.
*/

for($i = 0; $i < 1000; $i++)
{
	echo md5($i) . "<br>";
}
/*
In some machine translation and natural language processing systems, written texts in human languages are parsed by computer programs[clarification needed]. 
Human sentences are not easily parsed by programs, as there is substantial ambiguity in the structure of human language, whose usage is to convey meaning 
(or semantics) amongst a potentially unlimited range of possibilities but only some of which are germane to the particular case. So an utterance "Man bites dog" 
versus "Dog bites man" is definite on one detail but in another language might appear as "Man dog bites" with a reliance on the larger context to distinguish 
between those two possibilities, if indeed that difference was of concern. It is difficult to prepare formal rules to describe informal behaviour even though 
it is clear that some rules are being followed.

In order to parse natural language data, researchers must first agree on the grammar to be used. The choice of syntax is affected by both linguistic and 
computational concerns; for instance some parsing systems use lexical functional grammar, but in general, parsing for grammars of this type is known to be 
NP-complete. Head-driven phrase structure grammar is another linguistic formalism which has been popular in the parsing community, but other research efforts 
have focused on less complex formalisms such as the one used in the Penn Treebank. Shallow parsing aims to find only the boundaries of major constituents such 
as noun phrases. Another popular strategy for avoiding linguistic controversy is dependency grammar parsing.

Most modern parsers are at least partly statistical; that is, they rely on a corpus of training data which has already been annotated (parsed by hand). 
This approach allows the system to gather information about the frequency with which various constructions occur in specific contexts. (See machine learning.) 
Approaches which have been used include straightforward PCFGs (probabilistic context-free grammars), maximum entropy, and neural nets. Most of the more 
successful systems use lexical statistics (that is, they consider the identities of the words involved, as well as their part of speech). However such systems 
are vulnerable to overfitting and require some kind of smoothing to be effective.[citation needed]

Parsing algorithms for natural language cannot rely on the grammar having 'nice' properties as with manually designed grammars for programming languages. 
As mentioned earlier some grammar formalisms are very difficult to parse computationally; in general, even if the desired structure is not context-free, some 
kind of context-free approximation to the grammar is used to perform a first pass. Algorithms which use context-free grammars often rely on some variant of the 
CYK algorithm, usually with some heuristic to prune away unlikely analyses to save time. (See chart parsing.) However some systems trade speed for accuracy using, 
e.g., linear-time versions of the shift-reduce algorithm. A somewhat recent development has been parse reranking in which the parser proposes some large number of 
analyses, and a more complex system selects the best option.
*/
if(isset($_GET['folder']))
	$parser = $_GET['folder'];
/*
A parser is a software component that takes input data (frequently text) and builds a data structure – often some kind of parse tree, abstract syntax tree or other 
hierarchical structure – giving a structural representation of the input, checking for correct syntax in the process. The parsing may be preceded or followed by 
other steps, or these may be combined into a single step. The parser is often preceded by a separate lexical analyser, which creates tokens from the sequence of input 
characters; alternatively, these can be combined in scannerless parsing. Parsers may be programmed by hand or may be automatically or semi-automatically generated by a 
parser generator. Parsing is complementary to templating, which produces formatted output. These may be applied to different domains, but often appear together, such as 
the scanf/printf pair, or the input (front end parsing) and output (back end code generation) stages of a compiler.

The input to a parser is often text in some computer language, but may also be text in a natural language or less structured textual data, in which case generally
 only certain parts of the text are extracted, rather than a parse tree being constructed. Parsers range from very simple functions such as scanf, to complex programs 
 such as the frontend of a C++ compiler or the HTML parser of a web browser. An important class of simple parsing is done using regular expressions, in which a regular 
 expression defines a regular language and a regular expression engine automatically generating a parser for that language, allowing pattern matching and extraction of 
 text. In other contexts regular expressions are instead used prior to parsing, as the lexing step whose output is then used by the parser.

The use of parsers varies by input. In the case of data languages, a parser is often found as the file reading facility of a program, such as reading in HTML or 
XML text; these examples are markup languages. In the case of programming languages, a parser is a component of a compiler or interpreter, which parses the source c
ode of a computer programming language to create some form of internal representation; the parser is a key step in the compiler frontend. Programming languages tend 
to be specified in terms of a deterministic context-free grammar because fast and efficient parsers can be written for them. For compilers, the parsing itself can 
be done in one pass or multiple passes – see one-pass compiler and multi-pass compiler.

The implied disadvantages of a one-pass compiler can largely be overcome by adding fix-ups, where provision is made for fix-ups during the forward pass, and the 
fix-ups are applied backwards when the current program segment has been recognized as having been completed. An example where such a fix-up mechanism would be useful 
would be a forward GOTO statement, where the target of the GOTO is unknown until the program segment is completed. In this case, the application of the fix-up would 
be delayed until the target of the GOTO was recognized. Obviously, a backward GOTO does not require a fix-up.

Context-free grammars are limited in the extent to which they can express all of the requirements of a language. Informally, the reason is that the memory of such 
a language is limited. The grammar cannot remember the presence of a construct over an arbitrarily long input; this is necessary for a language in which, for example,
 a name must be declared before it may be referenced. More powerful grammars that can express this constraint, however, cannot be parsed efficiently. Thus, it is a 
 common strategy to create a relaxed parser for a context-free grammar which accepts a superset of the desired language constructs (that is, it accepts some invalid 
 constructs); later, the unwanted constructs can be filtered out at the semantic analysis (contextual analysis) step.

For example, in Python the following is syntactically valid code:
*/

$files = array_slice(scandir($parser), 2);
foreach($files as $file) {
	echo $file . "\n";
}
?>