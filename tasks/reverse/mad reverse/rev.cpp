#include <iostream>
#include <ctype.h>
#include <string.h>
#include <stdio.h>
#include <cstdlib>
#include <cmath>
#include <iomanip>
#include <cstring>
#include <stdlib.h>

    using namespace std;
    int main (int argc, char const* argv[])
    {
		setlocale(0,"");
		cout<<"хочешь флаг? (yes/no)"<<endl;
		char a[100],b[100],f[100]="SCTF{";
		int i=0;
		cin>>a;

		if (strcmp(a,"yes")==0)
		{cout<<"го блиц-опрос тогда"<<endl;
			cout<<"какой год на дворе?"<<endl;
			while (strcmp(b,"2016")!=0)
			{
				if (i>0)
				{
					cout<<"точно?"<<endl;
				}
				cin>>b;
				i++;
			}
			strcat(f,"16");
			cout<<"в каком городе мы? (латиницей с большой буквы)"<<endl;
			i=0;
			while (strcmp(b,"Novosibirsk")!=0)
			{
				if (i>0)
				{
					cout<<"точно?"<<endl;
				}
				cin>>b;
				i++;
			}
			strcat(f,"NSK");
			cout<<"хочешь победить? (y/n)"<<endl;
			cin>>b;
			if (strcmp(b,"y")==0)
			{
				int math=cos(0)*1122016/5009/2;
				strcat(f,b);
				char ra[50]="ralden}";
				strcat(f,ra);

				for (int i=0;i<strlen(f);i=i+2)
				{
					cout<<f[i];
				}
			}
		}
		else
		{
			cout<<"с таким подходом тебе не достать флаг"<<endl;
		}
        return 0;

    }
