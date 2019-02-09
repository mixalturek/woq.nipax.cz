<?
$p_title = 'HOWTO - C/C++';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Céčko není složité :o)</div>
<pre>
// Pole nespecifikované velikosti s ukazateli na funkce,
// které vrací ukazatele na funkce, které vrací void

void (*(*f[])())()
</pre>
</div>


<div class="object">
<div class="name">Debug výpisy</div>
<pre>
#define DEBUG(x) cerr &lt;&lt; "DEBUG: " &lt;&lt; __FILE__ &lt;&lt; ":" &lt;&lt; __LINE__ &lt;&lt; " " \
&lt;&lt; __FUNCTION__ &lt;&lt; "() " &lt;&lt; #x &lt;&lt; " = " &lt;&lt; (x) &lt;&lt; endl
</pre>
</div>


<div class="object">
<div class="name">OpenGL obdélník</div>
<pre>
glBegin(GL_QUADS);
	glTexCoord2f(0.0f, 0.0f); glVertex3i(-50, -50, -100);
	glTexCoord2f(1.0f, 0.0f); glVertex3i( 50, -50, -100);
	glTexCoord2f(1.0f, 1.0f); glVertex3i( 50,  50, -100);
	glTexCoord2f(0.0f, 1.0f); glVertex3i(-50,  50, -100);
glEnd();
</pre>
</div>


<div class="object">
<div class="name">PI ;-)</div>
<p>
<?php Blank('http://3.141592653589793238462643383279502884197169399375105820974944592.com/');?>
</p>
</div>


<div class="object">
<div class="name">Přetížení vstupu/výstupu</div>
<pre>
friend ostream&amp; operator&lt;&lt;(ostream&amp; o, const CList&amp; l);

ostream&amp; operator&lt;&lt;(ostream&amp; o, CList&amp; l)
{
    CList* tmp = &amp;l;

    while(tmp->next != NULL)// Vsechny prvky
        o &lt;&lt; tmp->i &lt;&lt; " ";

    return o;
}


///////////////////////////////////////////////////////////////////////////
//// I/O support
istream&amp; operator&gt;&gt;(istream&amp; is, CColor&amp; color);
ostream&amp; operator&lt;&lt;(ostream&amp; os, CColor&amp; color);

///////////////////////////////////////////////////////////////////////////
//// I/O support

istream&amp; operator&gt;&gt;(istream&amp; is, CColor&amp; color)
{
	Uint8 tmp;

	is &gt;&gt; tmp; color.SetR(tmp);
	is &gt;&gt; tmp; color.SetG(tmp);
	is &gt;&gt; tmp; color.SetB(tmp);
	is &gt;&gt; tmp; color.SetA(tmp);

	return is;
}

ostream&amp; operator&lt;&lt;(ostream&amp; os, CColor&amp; color)
{
	os &lt;&lt; color.GetR() &lt;&lt; " " &lt;&lt; color.GetG() &lt;&lt; " "
	   &lt;&lt; color.GetB() &lt;&lt; " " &lt;&lt; color.GetA();
	return os;
}
</pre>
</div>


<div class="object">
<div class="name">Jednoduchý makefile</div>
<pre>
TARGET		= prg
CC		= g++
CFLAGS		= -Wall
LDFLAGS		= -lm

$(TARGET): src.cpp
	$(CC) -o $(TARGET) src.cpp $(CFLAGS) $(LDFLAGS)

clean:
	rm -f $(TARGET) core
</pre>
</div>


<div class="object">
<div class="name">Makefile pro větší projekty</div>
<pre>
# With SDL and OpenGL support

TARGET		= prg
CC		= g++
CFLAGS		= -Wall $(shell sdl-config --cflags)
LDFLAGS		= -L/usr/X11R6/lib $(shell sdl-config --libs) -lSDL_image -lSDL_ttf -lGL -lGLU -lm
OBJECTS		= $(shell ls *.cpp | sed 's/.cpp/.o/')


.PHONY: depend
.PHONY: run
.PHONY: clean


%.o: %.cpp
	$(CC) -c $&lt; $(CFLAGS)

$(TARGET): $(OBJECTS)
	$(CC) -o $(TARGET) $(OBJECTS) $(LDFLAGS)

# Mozna bude nadavat kvuliva STL a SDL hlavickam, ale je to OK
depend:
	makedepend $(shell ls *.cpp)

run:
	./$(TARGET)

clean:
	rm -f $(TARGET) *.o core


# DO NOT DELETE

</pre>
</div>


<div class="object">
<div class="name">Pythonovské skripty spouštěné z Céčka</div>
<pre>
http://www.linuxjournal.com/article/8497

///// Makefile /////

TARGET		= prg
CC		= g++
CFLAGS		= -Wall -I/usr/include/python2.4
LDFLAGS		= -lpython2.4 -lm -L/usr/lib/python2.4/config

$(TARGET): python_v_cecku.cpp
	$(CC) -o $(TARGET) python_v_cecku.cpp $(CFLAGS) $(LDFLAGS)

clean:
	rm -f $(TARGET) core


///// source.cpp /////

#include &lt;Python.h&gt;
#include &lt;stdio.h&gt;

void exec_pycode(const char* code)
{
	Py_Initialize();
	PyRun_SimpleString(code);
	Py_Finalize();
}

int main(int argc, char *argv[])
{
	FILE *fp;
	long len;
	char *buf;

	fp=fopen("script.py", "rb");
	fseek(fp, 0, SEEK_END);
	len=ftell(fp);
	fseek(fp, 0, SEEK_SET);
	buf = (char *)malloc(len);
	fread(buf, len, 1, fp);
	fclose(fp);

	exec_pycode(buf);

	free(buf);

	return 0;
}


///// script.py /////

print 'Program vypise nejvyssi zadane cislo, pri zaporne hodnote se ukonci'

act = 5
max = None

while act > -1:
    try:
        act = int(raw_input())
    except ValueError:
        print 'Invalid Number'
        continue

    if act > max:
        max = act

print 'Nejvyssi zadane cislo:', max
</pre>
</div>


<div class="object">
<div class="name">Přátelské objekty a funkce</div>
<pre>
class NejakaTrida
{
	friend class CTrida;
	friend ostream&amp; operator&lt;&lt;(ostream&amp;, const CTrida&amp;);
};
</pre>
</div>


<div class="object">
<div class="name">Zákaz kopírování objektů</div>
<pre>
class CTrida
{
// Metody se nemusí definovat (asi)
private:
	CTrida::CTrida(const CTrida&amp;);
	CTrida&amp; operator=(const CTrida&amp;);
};
</pre>
</div>


<div class="object">
<div class="name">Zákaz implicitních koverzí u tříd</div>
<pre>
class CCislo
{
public:
	// Nikdy se nepoužije pro implicitní konverzi
	explicit CCislo(int cis);

private:
	int cislo;
};
</pre>
</div>


<div class="object">
<div class="name">Šablona auto_ptr</div>
<pre>
#include &lt;memory&gt;

auto_ptr&lt;CTrida&gt; uk(new CTrida(parametr));
// Paměť se uvolňuje automaticky
</pre>
</div>


<div class="object">
<div class="name">Zjištění jména třídy</div>
<pre>
#include &lt;typeinfo&gt;// ???

CTrida obj;
cout &lt;&lt; type_id(obj).name() &lt;&lt; endl;
</pre>
</div>


<div class="object">
<div class="name">Načtení celého souboru do paměti</div>
<pre>
    ifstream infile(file_src, ios::in | ios::binary);
    if(!infile)
    {
        cerr &lt;&lt; "Cannot open " &lt;&lt; file_src &lt;&lt; endl;
        return;
    }

    infile.seekg(0, ios::end);
    long file_size = infile.tellg();
    infile.seekg(0, ios::beg);
    char* file_content = new char[file_size];
    infile.read(file_content, file_size);
    infile.close();
</pre>
</div>


<div class="object">
<div class="name">Barevný výstup textu (musí být podpora v shellu)</div>
<pre>
#include &lt;stdio.h&gt;

/* Attributes */
#define RESET           0
#define BRIGHT          1
#define DIM             2
#define UNDERLINE       3
#define BLINK           4
#define REVERSE         7
#define HIDDEN          8

/* Colors */
#define BLACK           0
#define RED             1
#define GREEN           2
#define YELLOW          3
#define BLUE            4
#define MAGENTA         5
#define CYAN            6
#define WHITE           7

void textcolor(int attr, int fg, int bg)
{
	printf("%c[%d;%d;%dm", 0x1B, attr, fg + 30, bg + 40);
}

int main(int argc, char* argv[])
{
	textcolor(BRIGHT, RED, BLACK);
	printf("In color\n");
	textcolor(RESET, WHITE, BLACK);
	return 0;
}

/*
// Bright, fg red, bg black
cerr &lt;&lt; (char)0x1B &lt;&lt; "[" &lt;&lt; 1 &lt;&lt; ";" &lt;&lt; 31 &lt;&lt; ";" &lt;&lt; 40 &lt;&lt; "m";
cerr &lt;&lt; "[error] Something bad :-(" &lt;&lt; endl;
cerr &lt;&lt; (char)0x1B &lt;&lt; "[" &lt;&lt; 0 &lt;&lt; ";" &lt;&lt; 37 &lt;&lt; ";" &lt;&lt; 40 &lt;&lt; "m";
// Reset, fg white, bg black
*/

<?php Blank('http://www.linuxjournal.com/article/8603'); ?>
</pre>
</div>


<div class="object">
<div class="name">Zřetězení stringu s charem</div>
<pre>
const string operator+(const string&amp; str, const char ch)
{
	char tmp[2] = { ch, '\0' };
	return str + tmp;
}
</pre>
</div>


<div class="object">
<div class="name">Přesměrování streamu</div>
<pre>
#include &lt;iostream&gt;
#include &lt;fstream&gt;

using namespace std;

int main ()
{
	streambuf *psbuf;
	ofstream filestr;
	filestr.open ("test.txt");

	psbuf = filestr.rdbuf();
	cout.rdbuf(psbuf);

	cout &lt;&lt; "This is written to the file" &lt;&lt; endl;

	filestr.close();

	return 0;
}

<?php Blank('http://www.cplusplus.com/ref/iostream/ios/rdbuf.html'); ?>
</pre>
</div>


<div class="object">
<div class="name">Převody čísel mezi soustavami</div>
<pre>
#include &lt;cstdlib&gt;
strtoul()
</pre>
</div>


<div class="object">
<div class="name">stringstream</div>
<pre>
#include &lt;sstream&gt;

string GetString(void)
{
	stringstream ss;
	ss &lt;&lt; "Klasicky" &lt;&lt; "vystup" &lt;&lt; " do " &lt;&lt; "streamu";

	return ss.str();
}
</pre>
</div>


<div class="object">
<div class="name">Spuštění preprocesoru nad zdrojovým kódem</div>
<pre>
g++ -E soubor.cpp -std=c++98 -pedantic -Wall > preprocesovany.cpp
</pre>
</div>


<div class="object">
<div class="name">Formátování data a času v C++</div>
<pre>
#include &lt;ctime&gt;

string GenerateFilename()
{
	time_t rawtime;
	struct tm* timeinfo;
	char buffer[80];

	time(&amp;rawtime);
	timeinfo = localtime(&amp;rawtime);

	// transfered_YYYY-MM-DD_HH-MM-SS.dat
	strftime(buffer, 80, "transfered_%Y-%m-%d_%H-%M-%S.dat", timeinfo);

	return buffer;
}
</pre>
</div>


<div class="object">
<div class="name">Mapování signálů</div>
<pre>
#include &lt;signal.h&gt;

void sigint_handler(int param)
{
	cout &lt;&lt; "ctrl+c pressed." &lt;&lt; endl;
}

int main(int argc, char* argv[])
{
	signal(SIGINT, sigint_handler);

	while(true)
		;
}
</pre>
</div>


<div class="object">
<div class="name">Přeložení projektu z příkazové řádky (VC 2500)</div>
<pre>
"C:\Program Files\Microsoft Visual Studio 8\VC\bin\vcvars32.bat"
devenv solution.sln /Rebuild debug
devenv solution.sln /Rebuild release
</pre>
</div>


<div class="object">
<div class="name">Převedení řetězce na malá písmena</div>
<pre>
#include &lt;string&gt;
#include &lt;algorithm&gt;

string str = "Ahoj";
transform(str.begin(), str.end(), str.begin(), (int(*)(int))tolower);
</pre>
</div>


<div class="object">
<div class="name">Seřazení pole</div>
<pre>
#include &lt;vector&gt;
#include &lt;algorithm&gt;

bool CompareImages(const CImage&amp; img1, const CImage&amp; img2)
{
	return img1.GetPath() &lt; img2.GetPath();
}

vector&lt;CImage&gt; v;
sort(v.begin(), v.end(), CompareImages);
</pre>
</div>


<div class="object">
<div class="name">Výpis souborů v adresáři</div>
<pre>
#include &lt;dirent.h&gt;

void ListDirectory(const string&amp; path)
{
	DIR* handle = NULL;
	dirent* entry = NULL;

	if((handle = opendir(path.c_str())) == NULL)
		throw runtime_error(_("Couldn't open directory: ") + path);

	while((entry = readdir(handle)) != NULL)
		cout &lt;&lt; entry->d_name &lt;&lt; endl;

	closedir(handle);
}
</pre>
</div>


<div class="object">
<div class="name">Knihovny používané programem</div>
<pre>
[woq@woq sbkview]$ ldd sbkview
        linux-gate.so.1 =>  (0xffffe000)
        libSDL-1.2.so.0 => /usr/lib/libSDL-1.2.so.0 (0xb7ed1000)
        libSDL_image-1.2.so.0 => /usr/lib/libSDL_image-1.2.so.0 (0xb7eb6000)
        libSDL_ttf-2.0.so.0 => /usr/lib/libSDL_ttf-2.0.so.0 (0xb7eb1000)
        libSDL_gfx.so.4 => /usr/lib/libSDL_gfx.so.4 (0xb7e9f000)
        libstdc++.so.6 => /usr/lib/libstdc++.so.6 (0xb7dba000)
        libm.so.6 => /lib/tls/i686/cmov/libm.so.6 (0xb7d94000)
        libgcc_s.so.1 => /lib/libgcc_s.so.1 (0xb7d89000)
        libc.so.6 => /lib/tls/i686/cmov/libc.so.6 (0xb7c58000)
        libasound.so.2 => /usr/lib/libasound.so.2 (0xb7b97000)
        libdl.so.2 => /lib/tls/i686/cmov/libdl.so.2 (0xb7b93000)
        libdirectfb-0.9.so.25 => /usr/lib/libdirectfb-0.9.so.25 (0xb7b3c000)
        libfusion-0.9.so.25 => /usr/lib/libfusion-0.9.so.25 (0xb7b35000)
        libdirect-0.9.so.25 => /usr/lib/libdirect-0.9.so.25 (0xb7b26000)
        libvga.so.1 => /usr/lib/libvga.so.1 (0xb7ac6000)
        libpthread.so.0 => /lib/tls/i686/cmov/libpthread.so.0 (0xb7ab4000)
        libpng12.so.0 => /usr/lib/libpng12.so.0 (0xb7a91000)
        libz.so.1 => /usr/lib/libz.so.1 (0xb7a7d000)
        libfreetype.so.6 => /usr/lib/libfreetype.so.6 (0xb7a12000)
        /lib/ld-linux.so.2 (0xb7f9f000)
[woq@woq sbkview]$
</pre>
</div>


<div class="object">
<div class="name">Tabulka symbolů programu</div>
<pre>
[woq@woq serialkas]$ nm kas
         U __assert_fail@@GLIBC_2.0
0804db08 A __bss_start
08049014 t call_gmon_start
0804dd00 b completed.5621
0804d96c d __CTOR_END__
0804d95c d __CTOR_LIST__
         U __cxa_atexit@@GLIBC_2.1.3
         U __cxa_begin_catch@@CXXABI_1.3
         U __cxa_call_unexpected@@CXXABI_1.3
         U __cxa_end_catch@@CXXABI_1.3
         U __cxa_rethrow@@CXXABI_1.3
0804dafc W data_start
0804dafc D __data_start
0804bd30 t __do_global_ctors_aux
08049040 t __do_global_dtors_aux
0804db00 D __dso_handle
0804d974 d __DTOR_END__
0804d970 d __DTOR_LIST__
0804d97c d _DYNAMIC
0804db08 A _edata
...
</pre>
</div>


<div class="object">
<div class="name">Memory leaks indicator</div>
<pre>
// Enable-disable the checking
#define CHECK_MEMORY_LEAKS

#ifdef CHECK_MEMORY_LEAKS
#include &lt;set&gt;
#include &lt;typeinfo&gt;
#endif // CHECK_MEMORY_LEAKS

// Base class of the class hierarchy
class BaseObject
{
public:
	BaseObject();
	virtual ~BaseObject();

	virtual string toString(void) const = 0;

	uint getID(void) const { return m_id; }
	static uint getMaxID(void) { return m_max_id; }

private:
	static uint m_max_id;
	uint m_id;

#ifdef CHECK_MEMORY_LEAKS
	static set&lt;BaseObject*&gt; m_allocated_objects;

public:
	static void printMemoryLeaks(void);
#endif // CHECK_MEMORY_LEAKS
};


/////////////////////////////////////////////////////////////////////////////
////

uint BaseObject::m_max_id = 0;

#ifdef CHECK_MEMORY_LEAKS
set&lt;BaseObject*&gt; BaseObject::m_allocated_objects = set&lt;BaseObject*&gt;();
#endif // CHECK_MEMORY_LEAKS


/////////////////////////////////////////////////////////////////////////////
////

BaseObject::BaseObject()
	: m_id(m_max_id++)
{
#ifdef CHECK_MEMORY_LEAKS
	m_allocated_objects.insert(this);
#endif // CHECK_MEMORY_LEAKS
}

BaseObject::~BaseObject()
{
#ifdef CHECK_MEMORY_LEAKS
	m_allocated_objects.erase(this);
#endif // CHECK_MEMORY_LEAKS
}


/////////////////////////////////////////////////////////////////////////////
////

#ifdef CHECK_MEMORY_LEAKS
void BaseObject::printMemoryLeaks(void)
{
	cerr &lt;&lt; "================== BaseObject::printMemoryLeaks(void) ==================" &lt;&lt; endl;

	set&lt;BaseObject*&gt;::const_iterator it;
	for(it = m_allocated_objects.begin(); it != m_allocated_objects.end(); it++)
		cerr &lt;&lt; "id = " &lt;&lt; (*it)-&gt;getID() &lt;&lt; ", type = " &lt;&lt; typeid(**it).name()
			&lt;&lt; ", tostring = " &lt;&lt; (*it)-&gt;toString() &lt;&lt; ", mem = " &lt;&lt; *it &lt;&lt; endl;

	cerr &lt;&lt; endl;
	cerr &lt;&lt; "Total number of memory leaks: " &lt;&lt; m_allocated_objects.size() &lt;&lt; endl;
}
#endif // CHECK_MEMORY_LEAKS



int main(int argc, char** argv)
{
	// ...

#ifdef CHECK_MEMORY_LEAKS
	BaseObject::printMemoryLeaks();
#endif // CHECK_MEMORY_LEAKS

	cout &lt;&lt; "Total number of created objects: " &lt;&lt; BaseObject::getMaxID() &lt;&lt; endl;
	return 0;
}
</pre>
</div>


<div class="object">
<div class="name">Unit tests, verify macro</div>
<pre>
// TODO: check __STRING(expr) in non-Linux OS, see /usr/include/assert.h
// TODO: Try to use VERIFY() from MFC in MS Windows

// Verify macro, like assert but without exiting
#define verify(expr) \
	result = result &amp;&amp; (expr); \
	if(!(expr)) \
		cerr &lt;&lt; __FILE__ &lt;&lt; ":" &lt;&lt; __LINE__ \
		&lt;&lt; "   " &lt;&lt; __STRING(expr) &lt;&lt; endl


// Test template
bool Tests::test(void)
{
	bool result = true;

	// Add code here
	verify(true);

	return testResult(__FUNCTION__, result);
}


bool Tests::testResult(const string&amp; testName, bool result)
{
	if(result)
		cout  &lt;&lt; _("[ OK ]     ") &lt;&lt; testName &lt;&lt; endl;
	else
		cerr &lt;&lt; _("[ FAILED ] ") &lt;&lt; testName &lt;&lt; endl;

	return result;
}


void Tests::run(void)
{
	uint failed = 0;

	failed += !test();

	cout &lt;&lt; _("Number of failed tests: ") &lt;&lt; failed &lt;&lt; endl;
}
</pre>
</div>


<div class="object">
<div class="name">Paralelní build</div>
<pre>
# Dva procesory
alias make='colormake -j2'
</pre>
</div>


<div class="object">
<div class="name">Trace makro</div>
<pre>
#define TRACE(arg) cout &lt;&lt; #arg &lt;&lt; endl; arg
#define D(arg) cout &lt;&lt; #arg " = [" &lt;&lt; arg &lt;&lt; "]" &lt;&lt; endl;


// Použití
TRACE(for(int i = 0; i &lt; 5; i++) cout &lt;&lt; i &lt;&lt; endl;);
D(1 + 2);

// Výstup programu
for(int i = 0; i &lt; 5; i++) cout &lt;&lt; i &lt;&lt; endl;
0
1
2
3
4
1 + 2 = [3]

(Bruce Eckel: Thinking in C++ 2)
</pre>
</div>


<div class="object">
<div class="name">Doxygen</div>
<pre>
doxywizard

<?php Blank('http://www-scf.usc.edu/~peterchd/doxygen/');?>
</pre>
</div>


<div class="object">
<div class="name">Vyčištění kontejneru ukazatelů</div>
<pre>
struct DeleteObject
{
	template &lt;typename T&gt;
	void operator()(const T* ptr) const
	{
		delete ptr;
		ptr = NULL;
	}
};

for_each(v.begin(), v.end(), DeleteObject());

<?php Blank('http://www-staff.it.uts.edu.au/~ypisan/programming/stl50.html');?>
</pre>
</div>


<div class="object">
<div class="name">Mazání prvků z kontejneru</div>
<pre>
// Remove přesune hledaný prvek na konec
c.erase(remove(c.begin(), c.end(), 2004), c.end());

<?php Blank('http://www-staff.it.uts.edu.au/~ypisan/programming/stl50.html');?>
</pre>
</div>


<div class="object">
<div class="name">Kontejner ukazatelů s řazením</div>
<pre>
struct DereferenceLess
{
	template &lt;typename PtrType&gt;
	bool operator()(PtrType pT1, PtrType pT2) const
	{
		return *pT1 &lt; *pT2;
	}
};

set&lt;string*, DereferenceLess&gt; ssp;

<?php Blank('http://www-staff.it.uts.edu.au/~ypisan/programming/stl50.html');?>
</pre>
</div>


<div class="object">
<div class="name">Dešifrování STL chyb z kompilátoru</div>
<pre>
http://www.bdsoft.com/tools/stlfilt.html
</pre>
</div>


<div class="object">
<div class="name">Detekce úniků paměti</div>
<pre>
valgrind --leak-check=yes &lt;program&gt;
</pre>
</div>


<div class="object">
<div class="name">Inicializace random generátoru</div>
<pre>
#include &lt;time.h&gt;
srand(time(NULL));
</pre>
</div>


<!--
<div class="object">
<div class="name"></div>
<pre>

</pre>
</div>
-->


<?
include 'p_end.php';
?>
