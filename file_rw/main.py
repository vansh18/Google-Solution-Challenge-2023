import streamlit as st
from streamlit_chat import message

from langchain.chains import ConversationChain
from langchain.chains.conversation.memory import ConversationEntityMemory
from langchain.chains.conversation.prompt import ENTITY_MEMORY_CONVERSATION_TEMPLATE
from langchain.llms import OpenAI

from langchain import OpenAI, ConversationChain, LLMChain, PromptTemplate
from langchain.memory import ConversationBufferWindowMemory

import os
from dotenv import load_dotenv
load_dotenv()
os.environ["OPENAI_API_KEY"] = os.getenv("OPENAI_API_KEY")

# os.environ["OPENAI_API_KEY"] = st.secrets["OPENAI_API_KEY"]

MODEL = 'text-davinci-003' # st.selectbox(label='Model', options=['gpt-3.5-turbo','text-davinci-003','text-davinci-002','code-davinci-002'])
K = 10 # st.number_input(' (#)Summary of prompts to consider',min_value=3,max_value=1000)

st.set_page_config(page_title='HOPE', layout='wide')
st.title("HOPE")

if "generated" not in st.session_state:
    st.session_state["generated"] = []
if "past" not in st.session_state:
    st.session_state["past"] = []
if "input" not in st.session_state:
    st.session_state["input"] = ""
if "stored_session" not in st.session_state:
    st.session_state["stored_session"] = []

def get_text():

    input_text = st.text_input("You: ", st.session_state["input"], key="input",
                            placeholder="I am your HOPE! Ask me anything ...", 
                            label_visibility='hidden')
    return input_text

def new_chat():
    save = []
    for i in range(len(st.session_state['generated'])-1, -1, -1):
        save.append("User:" + st.session_state["past"][i])
        save.append("Bot:" + st.session_state["generated"][i])        
    st.session_state["stored_session"].append(save)
    st.session_state["generated"] = []
    st.session_state["past"] = []
    st.session_state["input"] = ""
    # st.session_state.entity_memory.store = {}
    # st.session_state.entity_memory.buffer.clear()

# Create an OpenAI instance
llm = OpenAI(temperature=0)

if 'entity_memory' not in st.session_state:
        st.session_state.entity_memory = ConversationBufferWindowMemory(k=K)

# Create the ConversationChain object with the specified configuration


# Create a ConversationEntityMemory object if not already created
if 'entity_memory' not in st.session_state:
        st.session_state.entity_memory = ConversationBufferWindowMemory(k=K)


template = """Hope is an expert in performing Cognitive Behavioural Therapy. Hope will be the Users Therapist.
Hope will converse with the user and help the user to overcome their mental health problems. Hope is very experienced and keeps in mind previous conversations made with the user.
User will share their thoughts and problems with Hope and Hope will try and solve them by Cognitive Behavioural Therapy.
Hope can help users who struggle with anxiety, depression, trauma, sleep disorder, relationships, work-stress, exam-stress and help them.
Hope may also suggest breathing exercises or simple tasks or any other conventional methods that may help the User.

{history}
User: {human_input}
Hope:"""

# If User is feeling Sucidal then give this sucide helpline: +123 4567 890
# Add agent tools to trigger calling autorities code, when user might get extreme thoughts 

prompt = PromptTemplate(
    input_variables=["history", "human_input"], 
    template=template
)

bot_chain = LLMChain(
    llm=OpenAI(temperature=0), 
    prompt=prompt, 
    verbose=True, 
    memory=st.session_state.entity_memory
)    

st.sidebar.button("New Chat", on_click = new_chat, type='primary')

user_input = get_text()

if user_input:
    output = bot_chain.predict(human_input = user_input)  
    st.session_state.past.append(user_input)
    st.session_state.generated.append(output)
    
with st.expander("Conversation", expanded=True):
    for i in range(len(st.session_state['generated'])-1, -1, -1):
        message(st.session_state["generated"][i], key=str(i))
        message(st.session_state['past'][i], is_user=True, key=str(i) + '_user')
        
        #st.info(st.session_state["past"][i],icon="🧐")
        #st.success(st.session_state["generated"][i], icon="🤖")

# Display stored conversation sessions in the sidebar
for i, sublist in enumerate(st.session_state.stored_session):
        with st.sidebar.expander(label= f"Conversation-Session:{i}"):
            st.write(sublist)

# Allow the user to clear all stored conversation sessions
if st.session_state.stored_session:   
    if st.sidebar.checkbox("Clear-all"):
        del st.session_state.stored_session
