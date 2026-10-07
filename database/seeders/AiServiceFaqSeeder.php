<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class AiServiceFaqSeeder extends Seeder
{
    /**
     * FAQs for the 12 new AI/agent/LLM service pages added alongside
     * ServiceSeeder. Safe to re-run — skips a service's FAQs if any already
     * exist for that slug.
     */
    public function run(): void
    {
        foreach ($this->faqs() as $slug => $faqs) {
            if (Faq::where('service_slug', $slug)->exists()) {
                continue;
            }

            foreach ($faqs as $index => $faq) {
                Faq::create([
                    'service_slug' => $slug,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'sort_order' => $index,
                    'is_active' => true,
                ]);
            }
        }
    }

    private function faqs(): array
    {
        return [
            'ai-chatbot-development' => [
                ['question' => 'Will the chatbot only answer from our own content, or make things up?', 'answer' => 'We ground it in your documents/data via retrieval and explicitly scope what it\'s allowed to answer from general knowledge, if anything — this gets defined during scoping, not left to chance.'],
                ['question' => 'Can it hand off to a human?', 'answer' => 'Yes — a clear escalation path (to a live chat queue, a support ticket, or an email) is part of every chatbot we build, not an afterthought.'],
                ['question' => 'Can the bot take actions, not just answer questions?', 'answer' => 'Yes, with function calling — for example checking an order status or booking a meeting. That overlaps with custom AI agent development depending on how much autonomy the bot needs.'],
                ['question' => 'How long does a chatbot project take?', 'answer' => 'A focused support chatbot grounded in existing documentation can often launch in a few weeks; scope expands with how many systems it needs to connect to.'],
            ],
            'ai-agent-development' => [
                ['question' => 'What\'s the difference between an AI agent and a chatbot?', 'answer' => 'A chatbot answers questions in conversation; an agent takes multi-step action using tools — looking things up, updating records, calling other systems — with a defined scope for what it\'s allowed to do on its own.'],
                ['question' => 'Can the agent make mistakes that affect our data?', 'answer' => 'We scope tool permissions specifically to prevent this, and add human approval steps for any action with real consequences unless you explicitly want full autonomy.'],
                ['question' => 'Do you use LangGraph or CrewAI for this?', 'answer' => 'Depending on the workflow — LangGraph fits well for a defined, stateful multi-step process, and CrewAI fits well when the task is naturally split across multiple specialized roles. We\'ll recommend based on your specific case.'],
                ['question' => 'How do we know what the agent is actually doing?', 'answer' => 'Every action the agent takes gets logged, and we build monitoring so unexpected behavior surfaces quickly rather than silently.'],
            ],
            'rag-development' => [
                ['question' => 'How is RAG different from fine-tuning?', 'answer' => 'Fine-tuning changes the model\'s weights; RAG retrieves relevant content at query time and hands it to an unmodified model as context. RAG is usually faster to build, easier to keep current, and more transparent about where an answer came from — which is why it fits most business use cases better than fine-tuning.'],
                ['question' => 'Can RAG work with our existing documents, even if they\'re messy or inconsistent?', 'answer' => 'Yes, though a content audit up front usually surfaces gaps worth fixing — RAG makes inconsistent documentation more visible, not less.'],
                ['question' => 'How do you measure if the retrieval is actually working?', 'answer' => 'We test against a set of real (or realistic) questions with known correct answers and measure how often the right context gets retrieved, before and after tuning.'],
                ['question' => 'Does this work with Claude, GPT, or Gemini?', 'answer' => 'Yes — RAG is largely model-agnostic; we choose the underlying LLM based on your accuracy, cost, and latency requirements, not the other way around.'],
            ],
            'langgraph-development' => [
                ['question' => 'When does a project actually need LangGraph, versus a simpler approach?', 'answer' => 'When the agent\'s logic genuinely branches or needs to persist state across steps — approval flows, retries, multi-stage processes. For a single-step task, we\'d recommend something simpler rather than adding LangGraph for its own sake.'],
                ['question' => 'Can a LangGraph agent recover from a failure partway through?', 'answer' => 'Yes, that\'s one of its main advantages — checkpointing lets a workflow resume from where it left off instead of restarting from scratch.'],
                ['question' => 'Does this replace the need for a database or backend?', 'answer' => 'No — LangGraph handles the agent\'s decision logic; it still needs to be integrated with your actual backend and data systems, which we build as part of the engagement.'],
                ['question' => 'Can you combine LangGraph with CrewAI?', 'answer' => 'Yes, in some cases — LangGraph for the overall workflow structure with specialized CrewAI-style roles handling individual nodes, though we\'ll only recommend combining them when the added complexity is actually justified.'],
            ],
            'crewai-development' => [
                ['question' => 'How is CrewAI different from LangGraph?', 'answer' => 'CrewAI is organized around role-based agents collaborating on a task; LangGraph is organized around an explicit state graph of steps. We pick based on whether your workflow is naturally role-specialized or naturally sequential/branching — sometimes a project uses ideas from both.'],
                ['question' => 'Does adding more agents make the system more reliable?', 'answer' => 'Not automatically — more agents means more handoff points, which is usually where things break. We scope the crew to the minimum number of roles that genuinely improves the result.'],
                ['question' => 'Can a CrewAI system access our internal tools and data?', 'answer' => 'Yes, each agent can be given specific tool access scoped to its role, including calls to your internal APIs or databases.'],
                ['question' => 'What kinds of tasks is CrewAI actually a good fit for?', 'answer' => 'Tasks with a natural division of labor — research-then-write pipelines, multi-step content review, structured qualification processes — rather than simple single-step requests.'],
            ],
            'mcp-development' => [
                ['question' => 'What can an MCP server actually let an AI assistant do?', 'answer' => 'Whatever you choose to expose — looking up records, searching internal documents, or taking scoped actions like creating a ticket. It\'s entirely defined by which tools you build into the server.'],
                ['question' => 'Is this safe to connect to production data?', 'answer' => 'Yes, when scoped correctly — we build authentication, permission scoping, and audit logging in from the start rather than exposing broad access for convenience.'],
                ['question' => 'Does this only work with Claude?', 'answer' => 'MCP is an open protocol, so a server built to spec can work with any MCP-compatible AI assistant, though Claude\'s adoption of MCP is currently the most common use case we build for.'],
                ['question' => 'How is this different from a regular API integration?', 'answer' => 'A regular API is built for your own application to call; an MCP server is built specifically so an AI assistant can discover and use your tools in a structured, standardized way during a conversation.'],
            ],
            'openai-integration' => [
                ['question' => 'Which GPT model should we use?', 'answer' => 'It depends on the task\'s complexity, latency requirement, and cost budget — we\'ll recommend the smallest model that reliably handles your use case rather than defaulting to the most capable (and most expensive) one.'],
                ['question' => 'What happens if the OpenAI API is down or slow?', 'answer' => 'We design an explicit fallback — a cached response, a simpler rules-based path, or a clear "try again" state — rather than letting the feature just break.'],
                ['question' => 'Can you help control our OpenAI API costs?', 'answer' => 'Yes — model selection, prompt length, and caching repeated queries are the main levers, and we build monitoring so you can see costs before they become a surprise.'],
                ['question' => 'Do you also work with Claude or Gemini instead?', 'answer' => 'Yes — we\'ll help you choose the right model provider for your use case, and can build integrations that work across more than one.'],
            ],
            'claude-api-integration' => [
                ['question' => 'When does Claude make more sense than GPT?', 'answer' => 'For long-document analysis, tasks needing precise instruction-following, or tool-use-heavy agents, Claude\'s design tends to help — but we\'ll evaluate your specific use case rather than assume one provider is always better.'],
                ['question' => 'Can Claude call our internal APIs or databases?', 'answer' => 'Yes, through its tool-use interface, scoped to exactly the functions and permissions you want it to have.'],
                ['question' => 'Can you process very large documents with Claude?', 'answer' => 'Yes, that\'s one of Claude\'s practical strengths — we design the pipeline around its context window rather than awkwardly chunking documents to fit a smaller one.'],
                ['question' => 'Do you build integrations that can switch between Claude, GPT, and Gemini?', 'answer' => 'Yes, when it\'s worth the added complexity — for some projects, being able to swap or compare model providers is genuinely useful; for others, committing to one is simpler and sufficient.'],
            ],
            'gemini-api-integration' => [
                ['question' => 'When does Gemini make more sense than GPT or Claude?', 'answer' => 'When the task genuinely involves image, video, or mixed-media input alongside text — that\'s where Gemini\'s native multimodal design gives a real, practical advantage.'],
                ['question' => 'Can Gemini analyze video, not just images?', 'answer' => 'Yes, video understanding is one of its supported capabilities, and we\'ll scope whether that fits your specific use case during the initial discussion.'],
                ['question' => 'Do we need to already use Google Cloud?', 'answer' => 'No, Gemini can be integrated via its API independently, though there are added integration options if a project already runs on Google Cloud infrastructure.'],
                ['question' => 'Can you build a feature that compares outputs across Gemini, GPT, and Claude?', 'answer' => 'Yes, for projects where model comparison or fallback across providers is genuinely valuable — though for most single-purpose features, committing to one well-chosen model is simpler.'],
            ],
            'llm-development' => [
                ['question' => 'Do you fine-tune models, or just prompt existing ones?', 'answer' => 'Mostly the latter — prompting and retrieval solve most business use cases without the cost and maintenance overhead of fine-tuning. We\'ll recommend fine-tuning specifically when there\'s a clear case for it.'],
                ['question' => 'How do you know if a prompt change actually made things better?', 'answer' => 'We test against a real evaluation set with known-good outputs, so changes get measured rather than judged by feel.'],
                ['question' => 'Can you help us choose between OpenAI, Claude, and Gemini?', 'answer' => 'Yes — model choice depends on your accuracy, latency, cost, and specific capability needs (like multimodal input or long context), which we\'ll assess against your actual use case.'],
                ['question' => 'What if our use case doesn\'t actually need an LLM?', 'answer' => 'We\'ll tell you directly — a lot of "AI feature" requests are better and more reliably solved with deterministic logic, and we\'d rather say that upfront than build something unnecessarily complex.'],
            ],
            'voice-ai-development' => [
                ['question' => 'Can a voice agent replace our phone support entirely?', 'answer' => 'For some call types, yes; for others, it should triage and hand off. We scope this per call type during discovery rather than assuming full replacement is the goal.'],
                ['question' => 'How does it handle accents or noisy environments?', 'answer' => 'We test explicitly against realistic audio conditions, not just clean sample recordings, and choose speech-to-text providers accordingly.'],
                ['question' => 'What happens if the voice agent doesn\'t understand the caller?', 'answer' => 'It\'s designed to recognize low confidence and hand off to a human agent rather than guessing or looping the caller through repeated prompts.'],
                ['question' => 'Can this integrate with our existing phone system?', 'answer' => 'Yes, typically through a telephony provider like Twilio connecting to your existing number and call routing.'],
            ],
            'ai-automation-services' => [
                ['question' => 'What kinds of tasks are actually good candidates for AI automation?', 'answer' => 'Repetitive tasks involving unstructured input — documents, emails, free-text records — where a defined error tolerance and a human review step (at least initially) make sense.'],
                ['question' => 'Is this the same as an AI agent or chatbot?', 'answer' => 'It can use similar underlying technology, but the framing is different — automation services focus on removing a specific manual bottleneck in an existing process, rather than building a conversational interface.'],
                ['question' => 'How do you measure whether the automation is actually working?', 'answer' => 'We track accuracy and time saved against the manual process it replaced, using real historical cases as the baseline, both before and after launch.'],
                ['question' => 'Do we need a human reviewing the output forever?', 'answer' => 'Not necessarily — for processes with real consequences we start with human review and reduce it over time as measured accuracy justifies more autonomy.'],
            ],
        ];
    }
}
