<?
$p_title = 'HOWTO - Qt';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Debug messages</div>
<pre>
#include &lt;QtDebug&gt;

qDebug() &lt;&lt; "something"; // #define QT_NO_DEBUG_OUTPUT
qWarning() &lt;&lt; "something";
qFatal() &lt;&lt; "something"; // + exit the application
</pre>
</div>


<div class="object">
<div class="name">Spojový seznam</div>
<pre>
QList&lt;QString&gt; list;

list &lt;&lt; "foo" &lt;&lt; "bar" &lt;&lt; "baz";

foreach(QString s, list)
	qDebug() &lt;&lt; s;
</pre>
</div>


<div class="object">
<div class="name">Třída se signály a sloty</div>
<pre>
class MyClass : public QObject
{
	Q_OBJECT

public slots:
protected slots:
private slots:
signals:
};
</pre>
</div>


<div class="object">
<div class="name">Vlákna</div>
<pre>
QThread::run()
QThread::start()
QThread::wait()
QThread::isFinished()
QThread::isRunning()
QThread::terminate()
QThread::finished() // signál

QMutex::lock()
QMutex::tryLock()
QMutex::unlock()
QMutexLocker::QMutexLocker(QMutex* mutex)

QReadWriteLock::lockForRead()
QReadWriteLock::lockForWrite()
QReadLocker::QReadLocker(QReadWriteLock* lock)
QWriteLocker::QWriteLocker(QReadWriteLock* lock)

QSemaphore::acquire()
QSemaphore::tryAcquire()
QSemaphore::release()

QWaitCondition::wait()
QWaitCondition::wakeAll()
QWaitCondition::wakeOne()

QAtomicInt

<?php Blank('http://doc.trolltech.com/4.5/threads.html'); ?>
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
